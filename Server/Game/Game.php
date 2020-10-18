<?php
namespace Game;

use TemplateRenderer\TemplateRenderer;

class Game
{
    private $gametitle;
    private $categories;
    private $renderer;

    public function __construct(array $xmlArray)
    {
        $this->gametitle = $xmlArray['Spieltitel'];
        $this->categories = $xmlArray['Kategorie'];
        $this->renderer = new TemplateRenderer(__DIR__ . '/templates');
    }
    
    public function start(): string
    {
        return $this->renderer->renderTemplate('game', [
            'gametitle' => $this->gametitle,
            'categoryColumns' => $this->renderCategoryColumns(),
            'overlayAnswersAndQuestions' => $this->renderOverlayAnswersAndQuestions(),
        ]);
    }

    private function renderCategoryColumns(): array
    {
        $categoryNumber = 1;
        $categoryColumns = [];

        foreach ($this->categories as $category) {
            $categoryColumns[] = $this->renderer->renderTemplate('categoryColumn', [
                'categorytitle' => $this->getCategorytitleFromCategory($category),
                'valueFields' => $this->renderValueFields($categoryNumber, $category),
            ]);
            $categoryNumber++;
        }

        return $categoryColumns;
    }

    private function renderValueFields(int $categoryNumber, array $category): array
    {
        $taskNumber = 1;
        $valueFields = [];

        foreach ($this->getTasksFromCategory($category) as $task) {
            $valueFields[] = $this->renderer->renderTemplate('valueField', [
                'category' => $categoryNumber,
                'task' => $taskNumber,
                'value' => $this->getValueFromTask($task),
            ]);
            $taskNumber++;
        }

        return $valueFields;
    }

    private function renderOverlayAnswersAndQuestions(): array
    {
        $categoryNumber = 1;
        $overlayAnswersAndQuestions = [];

        foreach ($this->categories as $category) {
            $taskNumber = 1;

            foreach ($this->getTasksFromCategory($category) as $task) {
                $overlayAnswersAndQuestions[] = $this->renderer->renderTemplate('overlayAnswerAndQuestion', [
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

    private function getCategorytitleFromCategory(array $category): string
    {
        return $category['Kategorietitel'];
    }

    private function getTasksFromCategory(array $category): array
    {
        return $category['Aufgabe'];
    }

    private function getQuestionFromTask(array $task): string
    {
        return $task['Fragestellung'];
    }

    private function getAnswerFromTask(array $task): string
    {
        return $task['Antwort'];
    }

    private function getValueFromTask(array $task): string
    {
        return $task['Wert'];
    }

}
