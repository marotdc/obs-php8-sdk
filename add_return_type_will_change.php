<?php
$dirPath = './Obs';

$methodsToAddAttribute = [
    'offsetExists',
    'offsetGet',
    'offsetSet',
    'offsetUnset',
    'count',
    'current',
    'key',
    'next',
    'rewind',
    'valid',
    'getIterator',
    'jsonSerialize',
    '__toString',
];

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirPath));
$regexIterator = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($regexIterator as $file) {
    $filePath = $file[0];
    $content = file_get_contents($filePath);

    foreach ($methodsToAddAttribute as $method) {
        $content = preg_replace_callback(
            "/(public|protected|private)(\s+)?function(\s+)$method(\s+)?\(/",
            function ($matches) {
                return "#[\ReturnTypeWillChange]\n" . $matches[0];
            },
            $content
        );
    }

    file_put_contents($filePath, $content);
}