<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $Mahasiswa = [
		'nama' => 'required',
		'nim' => 'required|max_length[8]|min_length[8]|numeric',
		'email' => 'required|valid_email',
		'prodi' => 'required',
		'foto' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|uploaded[foto]'
	];

	public $Mahasiswa_errors = [
		'nama' => [
			'required' => 'Kolom isian nama mahasiswa wajib diisi.',
		],
		'nim'    => [
			'required' => 'Kolom isian nim mahasiswa wajib diisi.',
			'max_length' => 'Kolom isian nim maksimal 8 karakter.',
			'numeric' => 'Kolom isian nim harus angka.',
			'min_length' => 'Kolom isian nim manimal 8 karakter.'
		],
		'email' => [
			'required' => 'Kolom isian alamat email mahasiswa wajib diisi.',
			'valid_email' => 'Kolom isian alamat Email tidak valid.'
		],
		'prodi' => [
			'required' => 'Kolom isian prodi wajib dipilih.'
		],
		'foto' => [
			'uploaded' => 'Kolom isian foto wajib dipilih.',
			'max_size' => 'Ukuran file terlalu besar (Maksimal 1 MB).',
			'is_image' => 'File yang dipilih bukan gambar.',
			'mime_in' => 'File yang dipilih bukan gambar.',
		]
	];
}
