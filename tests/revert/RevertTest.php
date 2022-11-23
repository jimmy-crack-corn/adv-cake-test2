<?php

namespace revert;

require_once 'RevertString.php';

class RevertTest extends \PHPUnit\Framework\TestCase {

    private \RevertString $revertStringHelper;

    protected function setUp(): void {
        $this->revertStringHelper = new \RevertString();
    }

    public function testRevertString() {
        $testData = [
            'Съешь еще этих мягких французских булок, да выпей чаю!',
            'И ты, Брут?',
            'А роза упала на лапу Азора',
            'Ночь, улица, фонарь, аптека',
            'Все будет так. Исхода нет.',
            false,
            null
        ];
        $expected = [
            'Ьшеъс еще хитэ хикгям хиксзуцнарф колуб, ад йепыв юач!',
            'И ыт, Турб?',
            'А азор алапу ан упал Ароза',
            'Ьчон, ацилу, ьраноф, акетпа',
            'Есв тедуб кат. Адохси тен.',
            'error: ожидается строка',
            'error: ожидается строка'
        ];
        foreach ($testData as $index => $testItem) {
            $this->assertEquals($expected[$index], $this->revertStringHelper->revert($testItem));
        }
    }
}