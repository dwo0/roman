<?php
namespace Roman;

const Levels = [
	[ 'Weight' => 1000, 'UpperSymbol' => "M", 'LowerSymbol' => "m" ],
	[ 'Weight' => 900, 'UpperSymbol' => "CM", 'LowerSymbol' => "cm" ],
	[ 'Weight' => 500, 'UpperSymbol' => "D", 'LowerSymbol' => "d" ],
	[ 'Weight' => 400, 'UpperSymbol' => "CD", 'LowerSymbol' => "cd" ],
	[ 'Weight' => 100, 'UpperSymbol' => "C", 'LowerSymbol' => "c" ],
	[ 'Weight' => 90, 'UpperSymbol' => "XC", 'LowerSymbol' => "xc" ],
	[ 'Weight' => 50, 'UpperSymbol' => "L", 'LowerSymbol' => "l" ],
	[ 'Weight' => 40, 'UpperSymbol' => "XL", 'LowerSymbol' => "xl" ],
	[ 'Weight' => 10, 'UpperSymbol' => "X", 'LowerSymbol' => "x" ],
	[ 'Weight' => 9, 'UpperSymbol' => "IX", 'LowerSymbol' => "ix" ],
	[ 'Weight' => 5, 'UpperSymbol' => "V", 'LowerSymbol' => "v" ],
	[ 'Weight' => 4, 'UpperSymbol' => "IV", 'LowerSymbol' => "iv" ],
	[ 'Weight' => 1, 'UpperSymbol' => "I", 'LowerSymbol' => "i" ]
];

/**
 * Converts a number to its Roman-numeral representation.
 *
 * @param int $Value
 * @param boolean $Lowercase
 * @return string
 */
function ToRoman(int $Value, bool $Lowercase = false): string {
	$Roman = "";
	if ($Value > 0 && $Value <= 3999) {
		foreach (Levels as $Level) {
			$Magnitude = intdiv($Value, $Level['Weight']);
			$Value -= $Level['Weight'] * $Magnitude;
			$Roman .= str_repeat($Lowercase ? $Level['LowerSymbol'] : $Level['UpperSymbol'], $Magnitude);
		}
	}
	return $Roman;
}

/**
 * Converts a Roman-numeral to its numerical value.
 *
 * @param string $Roman
 * @return int
 */
function FromRoman(string $Roman): int {
	$Value = 0;
	$Index = 0;
	foreach (Levels as $Level) {
		while (substr($Roman, $Index, strlen($Level['UpperSymbol'])) === $Level['UpperSymbol'] || substr($Roman, $Index, strlen($Level['LowerSymbol'])) === $Level['LowerSymbol']) {
			$Value += $Level['Weight'];
			$Index += strlen($Level['UpperSymbol']);
		}
	}
	return $Value;
}
?>
