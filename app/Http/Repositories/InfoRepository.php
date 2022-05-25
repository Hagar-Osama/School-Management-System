<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\InfoInterface;
use App\Http\Traits\FilesTraits;
use App\Http\Traits\InfoTraits;
use App\Models\Info;
use Exception;

class InfoRepository implements InfoInterface
{
    private $infoModel;
    use InfoTraits;
    use FilesTraits;




    public function __construct(Info $info)
    {
        $this->infoModel = $info;
    }

    public function index()
    {
        $collection = $this->getAllInfo();
        $info['info'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });

        return view('Info.info', $info);
    }


    public function update($request)
    {
        try {
            $info = $request->except(['token', 'method', 'logo']);
            foreach ($info as $key => $value) {
                $this->infoModel::where('key', $key)->update([
                    'value' => $value
                ]);
            }

            $info = $this->infoModel::where('key', 'logo')->first();
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = $logo->hashName();
                $this->uploadFile($logo, 'logo', $logoName, 'storage/logo/' . $info->value);
                $info->update([
                    'value' => isset($logoName) ? $logoName : $info->value
                ]);
            }


            //     $key = array_keys($info);
            //     $value = array_values($info);
            //    for ($i = 0; $i < count($info); $i++) {
            //         $this->infoModel::where('key', $key[$i])->update([
            //             'value' => $value[$i]

            //         ]);
            //     }


            toastr()->success(trans('messages.update'));
            return redirect(route('info.index'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
