<?php

namespace App\Tools\PdfGenerator\Latex;

use DateTimeImmutable;

class LatexAchievement implements \Stringable
{
    private const START_DATE_TEMPLATE = "od %s ";
    private const END_DATE_TEMPLATE = "do %s";
    private const ELEMENT_TEMPLATE = "\\item \\achievementItem{%s}{%s}";

    /** @var string */
    private $content;

    /** @var DateTimeImmutable|null */
    private $startDate;

    /** @var DateTimeImmutable|null */
    private $endDate;

    public function __construct(
        string $content,
        ?DateTimeImmutable $startDate,
        ?DateTimeImmutable $endDate
    )
    {
        $this->content = $content;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function __toString(): string
    {
        $date = "";
        if (!empty($this->startDate)) {
            $date .= sprintf(self::START_DATE_TEMPLATE);
        }
        if (!empty($this->endDate)) {
            $date .= sprintf(self::END_DATE_TEMPLATE);
        }
        return sprintf(self::ELEMENT_TEMPLATE, $this->content, $date);
    }
}