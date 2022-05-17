<?php
namespace App\Http\Traits;

trait OnlineExamsTraits {
    public function getAllOnlineExams()
    {
        return $this->onlineExamModel::get();
    }

    public function getOnlineExamById($onlineExamId)
    {
        return $this->onlineExamModel::findOrFail($onlineExamId);
    }

}
