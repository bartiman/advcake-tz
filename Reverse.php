<?php

/**
 * Класс для преобразования строки.
 * Меняет порядок букв в каждом слове, сохраняя регистр и пунктуацию.
 * 
 */
class Reverse
{
	protected $punctuation = [',', '.', ':', '"', '!', "'", '-', '_', '?'];

	/**
	 * Меняет порядок букв в слове, сохраняя регистр и пунктуацию.
	 * 
	 */
	public function word($string)
	{
		$_end_elem = null;
		$_string_array = preg_split("//u", $string, null, PREG_SPLIT_NO_EMPTY);

		// если последний символ это знак пунктуации, то убираем его из массива.
		if (in_array($_string_array[count($_string_array) - 1], $this->punctuation)) {
			$_end_elem = array_pop($_string_array);
		}

		// если первый символ написан с большой буквы, ставим его в нижний регистр, 
		// а последний символ ставим в верхний регистр
		if (mb_strtoupper($_string_array[0]) == $_string_array[0]) {
			$_string_array[0] = mb_strtolower($_string_array[0]);
			$_string_array[count($_string_array) - 1] = mb_strtoupper($_string_array[count($_string_array) - 1]);
		}

		$_reverse_array = array_reverse($_string_array);

		if (!is_null($_end_elem)) {
			$_reverse_array[] = $_end_elem;
		}

		return implode($_reverse_array);
	}

	/**
	 * Меняет порядок букв в каждом слове, сохраняя регистр и пунктуацию.
	 * 
	 */
	public function revertCharacters($string)
	{
		$reverse = [];

		foreach (explode(" ", $string) as $word) {
			$reverse[] = $this->word($word);
		}

		return implode(" ", $reverse);
	}
}
