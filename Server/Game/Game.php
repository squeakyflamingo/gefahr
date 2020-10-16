<?php
namespace Game;

use Game\TemplateRenderer;

class Game
{
    private $gametitle;
    private $categories;
    private $templateRenderer;

    public function __construct(array $xmlArray, string $templateDirectory)
    {
        $this->gametitle = $xmlArray['Spieltitel'];
        $this->categories = $xmlArray['Kategorie'];
        $this->templateRenderer = new TemplateRenderer($templateDirectory);
    }
    
    public function start()
    {
        return $this->templateRenderer->renderTemplate('game', [
            'gametitle' => $this->gametitle,
            'categoryColumns' => $this->renderCategoryColumns(),
            'overlayAnswersAndQuestions' => $this->renderOverlayAnswersAndQuestions(),
        ]);
    }

    private function renderCategoryColumns()
    {
        $categoryNumber = 1;
        $categoryColumns = [];

        foreach ($this->categories as $category) {
            $categoryColumns[] = $this->templateRenderer->renderTemplate('categoryColumn', [
                'categorytitle' => $this->getCategorytitleFromCategory($category),
                'valueFields' => $this->renderValueFields($categoryNumber, $category),
            ]);
            $categoryNumber++;
        }

        return $categoryColumns;
    }

    private function renderValueFields(int $categoryNumber, array $category)
    {
        $taskNumber = 1;
        $valueFields = [];

        foreach ($this->getTasksFromCategory($category) as $task) {
            $valueFields[] = $this->templateRenderer->renderTemplate('valueField', [
                'category' => $categoryNumber,
                'task' => $taskNumber,
                'value' => $this->getValueFromTask($task),
            ]);
            $taskNumber++;
        }

        return $valueFields;
    }

    private function renderOverlayAnswersAndQuestions() {
        $categoryNumber = 1;
        $overlayAnswersAndQuestions = [];

        foreach ($this->categories as $category) {
            $taskNumber = 1;

            foreach ($this->getTasksFromCategory($category) as $task) {
                $overlayAnswersAndQuestions[] = $this->templateRenderer->renderTemplate('overlayAnswerAndQuestion', [
                    'category' => $categoryNumber,
                    'task' => $taskNumber,
                    'answer' => $this->getAnswerFromTask($task),
                    'question' => $this->getQuestionFromTask($task),
                    'value' => $this->getValueFromTask($task),
                ]);

                $taskNumber++;
            }

            $categoryNumber++;
        }

        return $overlayAnswersAndQuestions;
    }

    private function getCategorytitleFromCategory(array $category)
    {
        return $category['Kategorietitel'];
    }

    private function getTasksFromCategory(array $category)
    {
        return $category['Aufgabe'];
    }

    private function getQuestionFromTask(array $task)
    {
        return $task['Fragestellung'];
    }

    private function getAnswerFromTask(array $task)
    {
        return $task['Antwort'];
    }

    private function getValueFromTask(array $task)
    {
        return $task['Wert'];
    }

}
