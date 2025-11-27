<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Image extends Block
{
	public $name = 'Obraz';
	public $description = 'image';
	public $slug = 'image';
	public $category = 'formatting';
	public $icon = 'format-image';
	public $keywords = ['obraz', 'zdjecie'];
	public $mode = 'edit'; 
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
		'anchor' => true,
		'customClassName' => true,
	];

	public function fields()
	{
		$image = new FieldsBuilder('image');

		$image
			->setLocation('block', '==', 'acf/image') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Obraz',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- GROUP ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_image', ['label' => ''])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', [
				'label' => 'ID',
			])
			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])
			->addTrueFalse('container', [
				'label' => 'Dodaj zerokość kontenera',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addSelect('background', [
                'label' => 'Kolor tła',
                'choices' => [
                    'none' => 'Brak (domyślne)',
                    'section-white' => 'Białe',
                    'section-light' => 'Jasne',
                    'section-gray' => 'Szare',
                    'section-brand' => 'Marki',
                    'section-gradient' => 'Gradient',
                    'section-dark' => 'Ciemne',
                ],
                'default_value' => 'none',
                'ui' => 0, // Ulepszony interfejs
                'allow_null' => 0,
            ]);

		return $image;
	}

	public function with()
	{
		return [
			'g_image' => get_field('g_image'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'container' => get_field('container'),
			'nomt' => get_field('nomt'),
			'background' => get_field('background'),
		];
	}
}
