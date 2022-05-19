<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\QuestionsInterface;
use App\Http\Requests\AddQuestionRequest;
use App\Http\Requests\DeleteQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $questionInterface;

    public function __construct(QuestionsInterface $questionInterface)
    {
        $this->questionInterface = $questionInterface;
    }

    public function index()
    {
        return $this->questionInterface->index();

    }

    public function create()
    {
        return $this->questionInterface->create();

    }

    public function store(AddQuestionRequest $request)
    {
        return $this->questionInterface->store($request);
    }

    public function edit($questionId)
    {
        return $this->questionInterface->edit($questionId);

    }

    public function update(UpdateQuestionRequest $request)
    {
        return $this->questionInterface->update($request);
    }

    public function destroy(DeleteQuestionRequest $request)
    {
        return $this->questionInterface->destroy($request);
    }
}
