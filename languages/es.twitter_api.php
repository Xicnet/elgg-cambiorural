<?php
/**
 * An english language definition file
 */

$spanish = array(
	'twitter_api' => 'Servicios de Twitter',

	'twitter_api:requires_oauth' => 'Los Services de Twitter requieren el plugin OAuth Libraries para poder activarse.',

	'twitter_api:consumer_key' => 'Clave del Consumidor',
	'twitter_api:consumer_secret' => 'Secreto del Consumidor',

	'twitter_api:settings:instructions' => 'Debe obtener la clave y el secreto del consumidor en <a href="https://dev.twitter.com/apps/new" target="_blank">Twitter</a>. Complete la nueva app. Seleccione "Browser" como tipo de app y tipee "Read & Write" para el tipo de acceso. La url de callback es %stwitter_api/authorize',

	'twitter_api:usersettings:description' => "Enlace su cuenta %s con Twitter.",
	'twitter_api:usersettings:request' => "Primero debe <a href=\"%s\">autorizar</a> %s para acceder a su cuenta de Twitter.",
	'twitter_api:usersettings:cannot_revoke' => "No puede romper el enlace con su cuenta de Twitter ya que no ingresó un usuario y contraseña. <a href=\"%s\">Ingréselos aquí</a>.",
	'twitter_api:authorize:error' => 'No se puede autorizar Twitter.',
	'twitter_api:authorize:success' => 'El acceso a Twitter ha sido autorizado.',

	'twitter_api:usersettings:authorized' => "Ha autorizado a %s para acceder a su cuenta de Twitter: @%s.",
	'twitter_api:usersettings:revoke' => 'Click <a href="%s">aquí</a> para revocar el acceso.',
	'twitter_api:revoke:success' => 'El acceso a Twitter ha sido revocado.',

	'twitter_api:login' => 'Permitir a los usuarios que han registrado su Twitter autenticarse con su cuenta de Twitter?',
	'twitter_api:new_users' => 'Permitir a los nuevos usuarios autenticarse utilizando su cuenta de Twitter si la registración de usuarios se encuentra desactivada?',
	'twitter_api:login:success' => 'Se ha autenticado.',
	'twitter_api:login:error' => 'No se pudo autenticar con Twitter.',
	'twitter_api:login:email' => "Debe ingresar una dirección de correo válida para su cuenta de %s.",

	'twitter_api:invalid_page' => 'Página inválida',

	'twitter_api:deprecated_callback_url' => 'La URL de callback para la API de Twitter ha cambiado a %s. Por favor consulte con su administrador para modificarla.',

	'twitter_api:interstitial:settings' => 'Configure sus preferencias',
	'twitter_api:interstitial:description' => 'Se encuentra casi listo para utilizar %s! Necesitamos unos pocos detalles más para continuar. Son opcionales, pero le permitirán. autenticarse si se cae Twitter o desea desvincular sus cuentas',

	'twitter_api:interstitial:username' => 'Este es su nombre de usuario, no puede ser modificado. Si establece una contraseña, puede utilizar su nombre de usuario o Email para autenticarse.',

	'twitter_api:interstitial:name' => 'Este es el nombre que la gente verá para interactuar contigo.',

	'twitter_api:interstitial:email' => 'Su dirección de Email. Por defecto no es visible para los usuarios.',

	'twitter_api:interstitial:password' => 'Una contraseña para autenticarse si Twitter se encuentra caído o desea desvincular sus cuentas.',
	'twitter_api:interstitial:password2' => 'La misma contraseña, otra vez.',

	'twitter_api:interstitial:no_thanks' => 'No, gracias',

	'twitter_api:interstitial:no_display_name' => 'Debe tener un nombre para mostrar.',
	'twitter_api:interstitial:invalid_email' => 'Debe ingresar una dirección de mail válida o dejar en blanco.',
	'twitter_api:interstitial:existing_email' => 'El mail ya se encuentra registrado en el sitio.',
	'twitter_api:interstitial:password_mismatch' => 'Las contraseñas no coinciden.',
	'twitter_api:interstitial:cannot_save' => 'No se pueden guardar los detalles de la cuenta.',
	'twitter_api:interstitial:saved' => 'Detalles de la cuenta guardados!',
);

add_translation('es', $spanish);
