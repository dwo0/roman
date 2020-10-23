interface Level {
	Weight: number;
	UpperSymbol: string;
	LowerSymbol: string;
}

const Levels: Level[] = [
	{ Weight: 1000, UpperSymbol: "M", LowerSymbol: "m" },
	{ Weight: 900, UpperSymbol: "CM", LowerSymbol: "cm" },
	{ Weight: 500, UpperSymbol: "D", LowerSymbol: "d" },
	{ Weight: 400, UpperSymbol: "CD", LowerSymbol: "cd" },
	{ Weight: 100, UpperSymbol: "C", LowerSymbol: "c" },
	{ Weight: 90, UpperSymbol: "XC", LowerSymbol: "xc" },
	{ Weight: 50, UpperSymbol: "L", LowerSymbol: "l" },
	{ Weight: 40, UpperSymbol: "XL", LowerSymbol: "xl" },
	{ Weight: 10, UpperSymbol: "X", LowerSymbol: "x" },
	{ Weight: 9, UpperSymbol: "IX", LowerSymbol: "ix" },
	{ Weight: 5, UpperSymbol: "V", LowerSymbol: "v" },
	{ Weight: 4, UpperSymbol: "IV", LowerSymbol: "iv" },
	{ Weight: 1, UpperSymbol: "I", LowerSymbol: "i" }
];

/**
 * Converts a number to its Roman-numeral representation.
 * 
 * @param {number} Value
 * @param {boolean} [Lowercase=false]
 * @returns {string}
 */
export function ToRoman(Value: number, Lowercase: boolean = false): string {
	let Roman = "";
	if (Value > 0 && Value <= 3999) {
		for (const Level of Levels) {
			let Magnitude = Math.floor(Value / Level.Weight);
			Value -= Level.Weight * Magnitude;
			Roman += (Lowercase ? Level.LowerSymbol : Level.UpperSymbol).repeat(Magnitude);
		}
	}
	return Roman;
}

/**
 * Converts a Roman-numeral to its numerical value.
 * 
 * @param {string} Roman
 * @returns {number}
 */
export function FromRoman(Roman: string): number {
	let Value = 0;
	let Index = 0;
	for (const Level of Levels) {
		while (Roman.startsWith(Level.UpperSymbol, Index) || Roman.startsWith(Level.LowerSymbol, Index)) {
			Value += Level.Weight;
			Index += Level.UpperSymbol.length;
		}
	}
	return Value;
}