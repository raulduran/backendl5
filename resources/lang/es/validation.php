<?php

return array(

	"accepted"         => ":attribute debe ser aceptado.",
	"active_url"       => ":attribute no es una URL válida.",
	"after"            => ":attribute debe ser una fecha posterior a :date.",
	"alpha"            => ":attribute solo debe contener letras.",
	"alpha_dash"       => ":attribute solo debe contener letras, números y guiones.",
	"alpha_num"        => ":attribute solo debe contener letras y números.",
	"array"            => ":attribute debe ser un conjunto.",
	"before"           => ":attribute debe ser una fecha anterior a :date.",
	"between"          => array(
		"numeric" => ":attribute tiene que estar entre :min - :max.",
		"file"    => ":attribute debe pesar entre :min - :max kilobytes.",
		"string"  => ":attribute tiene que tener entre :min - :max caracteres.",
		"array"   => ":attribute tiene que tener entre :min - :max ítems.",
	),
	"confirmed"        => "La confirmación de :attribute no coincide.",
	"date"             => ":attribute no es una fecha válida.",
	"date_format"      => ":attribute no corresponde al formato :format.",
	"different"        => ":attribute y :other deben ser diferentes.",
	"digits"           => ":attribute debe tener :digits dígitos.",
	"digits_between"   => ":attribute debe tener entre :min y :max dígitos.",
	"email"            => ":attribute no es un correo válido",
	"exists"           => ":attribute es inválido.",
	"image"            => ":attribute debe ser una imagen.",
	"in"               => ":attribute es inválido.",
	"integer"          => ":attribute debe ser un número entero.",
	"ip"               => ":attribute debe ser una dirección IP válida.",
	"max"              => array(
		"numeric" => ":attribute no debe ser mayor a :max.",
		"file"    => ":attribute no debe ser mayor que :max kilobytes.",
		"string"  => ":attribute no debe ser mayor que :max caracteres.",
		"array"   => ":attribute no debe tener más de :max elementos.",
	),
	"mimes"            => ":attribute debe ser un archivo con formato: :values.",
	"min"              => array(
		"numeric" => "El tamaño de :attribute debe ser de al menos :min.",
		"file"    => "El tamaño de :attribute debe ser de al menos :min kilobytes.",
		"string"  => ":attribute debe contener al menos :min caracteres.",
		"array"   => ":attribute debe tener al menos :min elementos.",
	),
	"not_in"           => ":attribute es inválido.",
	"numeric"          => ":attribute debe ser numérico.",
	"regex"            => "El formato de :attribute es inválido.",
	"required"         => "El campo :attribute es obligatorio.",
	"required_if"      => "El campo :attribute es obligatorio cuando :other es :value.",
	"required_with"    => "El campo :attribute es obligatorio cuando :values está presente.",
	"required_without" => "El campo :attribute es obligatorio cuando :values no está presente.",
	"same"             => ":attribute y :other deben coincidir.",
	"size"             => array(
		"numeric" => "El tamaño de :attribute debe ser :size.",
		"file"    => "El tamaño de :attribute debe ser :size kilobytes.",
		"string"  => ":attribute debe contener :size caracteres.",
		"array"   => ":attribute debe contener :size elementos.",
	),
	"unique"           => ":attribute ya ha sido registrado.",
	"url"              => "El formato :attribute es inválido.",
	"dni"              => "El formato :attribute es inválido.",
	"campaing_required"  => "Debe seleccionar una :attribute",
	"ids_required"  => "Debe seleccionar al menos un :attribute",

	"date_same"            => ":attribute debe ser una fecha posterior o igual a :date.",

	'custom.date_end.date_same' => ":attribute debe ser una fecha posterior o igual a Fecha inicio.",
	
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	'unique_with' => 'El registro ya existe, modifique, :attribute.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'username' => 'Usuario',
		'phone' => 'Teléfono',
		'role_id' => 'Rol',
		'user_id' => 'Usuario',
		'dni' => 'Dni',
		'email' => 'Email',
		'start' => 'Inicio',
		'end' => 'Fin',
		'birthdate' => 'Fecha de nacimiento',
		'category_id' => 'Categoría',
		'article_id' => 'Artículo',
		'name' => 'Nombre',
		'surname' => 'Apellidos',
		'password' => 'Contraseña',
		'description' => 'Descripción',
		'body' => 'Descripción',
		'logo' => 'Logo',
		'img' => 'Foto',
		'title' => 'Título',
		'code' => 'Código',
		'subtitle' => 'Subtítulo',
		'video' => 'Vídeo',
 		"lat" => "Latitud",
 		"lng" => "Longitud",
 		"address" => "Dirección",
 		"group" => "Grupo",
 		"device_id" => "Dispositivo",
		'kcal' => 'Gasto energético',
		'role' => 'Rol',
	),

);
