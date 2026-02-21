<?php

namespace Wertelko\EasyadminContentBundle\Content\Configurator;

use Wertelko\EasyadminContentBundle\Content\ContentInterface;
use Wertelko\EasyadminContentBundle\Content\TableContent;
use function Symfony\Component\String\u;

class TableContentConfigurator implements ContentConfiguratorInterface
{

    public function configure(ContentInterface $content): void
    {
        $dto = $content->getDto();
        $rows = $dto->getContent();
        $counter = 0;
        foreach ($rows as $k => $row) {
            if (!is_iterable($row)) {
                $rows[$k] = [$row];
            }
            $counter++;
        }

        $dto->setContent($rows);
        $content->getDto()->setOption('rows_count', $counter);

        if ($dto->getOption('display_headers', true)) {
            $headers = $dto->getOption('headers', $this->createHeaders($rows));
            $dto->setOption('headers', $headers);
        }
    }

    public static function getContentType(): string
    {
        return TableContent::class;
    }

    private function createHeaders(array $rows)
    {
        $abc = range('a', 'z');
        $headers = array_keys(array_first($rows)) ?? [];
        foreach ($headers as $k => $header) {
            if (is_numeric($header)) {
                $headers[$k] = 'Column ' . ($abc[$k] ?? 'n' . $k);
            }
        }
        return array_map(fn($s) => u($s)->snake()->replace('_', ' ')->title(true), $headers);
    }
}