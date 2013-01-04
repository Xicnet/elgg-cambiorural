<?php
/**
* Custom translation strings for Cambio Rural
*/
$Spanish = array(
       # 15: change tags to palabras claves
       'tag'      => 'palabra clave',
       'tags'     => 'Palabras claves',
       # TheWire
       'thewire:noposts' => 'No hay mensajes.',
	   'thewire' => 'Mensajes a la red',
	   'thewire:everyone' => 'Todos los mensajes a la red',
	   'thewire:user' => 'Mensajes a la red de %s',
	   'thewire:friends' => 'Mensajes a la red de amigos',
	   'thewire:tags' => 'Mensajes a la red que coinciden con el tag \'%s\'',
	   'thewire:noposts' => 'No hay mensajes a la red aún',
	   'item:object:thewire' => 'Mensajes a la red',
	   'thewire:by' => 'Mensaje a la red mandado por %s',
	   'thewire:wire' => 'mensajes a la red',
	   'thewire:widget:desc' => 'Mostrar tus últimos mensajes a la red',
	   'thewire:num' => 'Cantidad de mensajes a la red a mostrar',
	   'thewire:moreposts' => 'Más mensajes a la red',
	   'thewire:notfound' => 'Lo sentimos, no se pudo encontrar el mensaje solicitado.',
	   'thewire:notdeleted' => 'Lo sentimos, no se pudo eliminar el mensaje.',
	   'thewire:notify:subject' => 'Nuevo mensaje a la red',
	   'thewire:notify:reply' => '%s respondió a %s con un mensaje:',
	   'thewire:notify:post' => '%s publicó un nuevo mensaje:',
	   'river:create:object:thewire' => '%s mandó un nuevo %s',
	   'thewire:reply' => 'Responder',
	   'thewire:replying' => 'Responder a %s (@%s) quien escribe',
	   'thewire:thread' => 'Debate',
	   'thewire:charleft' => 'caracteres restantes',
	   'thewire:update' => 'Actualizar',
	   'thewire:previous' => 'Anterior',
	   'thewire:hide' => 'Ocultar',
	   'thewire:previous:help' => 'Ver publicaci&oacute;n anterior',
	   'thewire:hide:help' => 'Ocultar publicaci&oacute;n anterior',
	   'thewire:posted' => 'El mensaje se public&oacute; correctamente.',
	   'thewire:deleted' => 'El mensaje se elimin&oacute; correctamente.',
	   'thewire:blank' => 'Debe ingresar contenido para poder publicar.',

       'blog' => 'Informes',
       'informe:blogs' => 'Informes',
       'informe:revisions' => 'Versiones',
       'informe:archives' => 'Archives',
       'informe:blog' => 'Informe',
       'item:object:blog' => 'Informes',
       
       'informe:title:user_informes' => 'Informes del grupo %s',
       'informe:title:all_informes' => 'All site informes',
       'informe:title:friends' => 'Friends\' informes',
       
       'informe:group' => 'Informes mensuales',
       'informe:enable_informe' => 'Enable group informe',
       'informe:write' => 'Write a informe post',
       
       // Editing
       'informe:add' => 'Crear informe',
       'informe:edit' => 'Editar informe',
       'informe:excerpt' => 'Excerpt',
       'informe:body' => 'Body',
       'informe:save_status' => 'Guardado por última vez: ',
       'informe:never' => 'Nunca',
       
       // Statuses
       'informe:status' => 'Status',
       'informe:status:draft' => 'Borrador',
       'informe:status:published' => 'Publicado',
       'informe:status:unsaved_draft' => 'Borrador sin guardar',
       
       'informe:revision' => 'Revision',
       'informe:auto_saved_revision' => 'Versión guardada automáticamente',
       
       // messages
       'informe:message:saved' => 'Informe guardado.',
       'informe:error:cannot_save' => 'No se puede guardar el informe.',
       'informe:error:cannot_write_to_container' => 'Permisos insuficientes para guardar el informe.',
       'informe:messages:warning:draft' => 'There is an unsaved draft of this post!',
       'informe:edit_revision_notice' => '(Old version)',
       'informe:message:deleted_post' => 'Informe borrado.',
       'informe:error:cannot_delete_post' => 'No se puede borrar el informe.',
       'informe:none' => 'No hay informes',
       'informe:error:missing:title' => 'Please enter a informe title!',
       'informe:error:missing:description' => 'Please enter the body of your informe!',
       'informe:error:cannot_edit_post' => 'This post may not exist or you may not have permissions to edit it.',
       'informe:error:revision_not_found' => 'Cannot find this revision.',
       
       // river
       'river:create:object:blog' => '%s ha publicado un informe %s',
       'river:comment:object:blog' => '%s hizo un comentario sobre el informe %s',
	   'river_privacy:hide_old:label' => '¿Esconder las previas entradas del Río?',
	   
	   // subgroups
	   'subgroups' => 'Subgrupos',
	   'subgroups:more' => 'Ver todos los subgrupos',
	   'subgroups:owner' => 'Subgrupos de %s',
	   'subgroups:owner:single' => 'Subgrupo de %s',
	   'subgroups:none' => 'Este grupo no tiene subgrupos.',
	   'subgroups:group' => 'Subgrupos del grupo',
	   'subgroups:in_frontpage' => 'Muestra los subgrupos en la página del grupo',
	   'subgroups:add' => 'Edita los subgrupos',
	   'subgroups:new' => 'Nuevo subgrupo',
	   'subgroups:new:of' => 'Nuevo subgrupo de «%s»',
	   'subgroups:add:label' => 'Escribe el nombre del grupo',
	   'subgroups:addurl:label' => 'Copia la URL del grupo aquí',
	   'subgroups:add:button' => 'Añade como subgrupo',
	   'subgroups:dontwork' => 'No funciona?',
	   'subgroups:unlink' => 'Desvincula grupos',
	   'subgroups:nopermissons' => 'No tienes permisos para modificar el grupo',
	   'subgroups:add:error' => 'Ha habido un error. Has escrito bien el nombre del grupo?',
	   'add' => 'Añade',
       
       // notifications
       'informe:newpost' => 'A new informe post',
       'informe:notification' =>
       '
       %s made a new informe post.
       
       %s
       %s
       
       View and comment on the new informe post:
       %s
       ',
       
       // widget
       'informe:widget:description' => 'Display your latest informe posts',
       'informe:more_informes' => 'More informe posts',
       'informe:numbertodisplay' => 'Number of informe posts to display',
       'informe:noblogs' => 'No hay informes',

	   // admin
	   'item:object:report_activity' => 'Actividades de cambio rural',
	   'item:object:informe' => 'Informes mensuales',
	   'item:object:image' => 'Imagines',
	   'item:object:album' => 'Albums de Fotos',
	   'item:object:announcement_page' => 'Paginas de anuncios',
	   'item:object:report' => 'Objectos reportados',
	   'item:object:announcement' => 'Anuncios',

	'itemobjectannouncement' => 'Anuncios',
	'friends' => "Amigos",
	'groups:widget:membership' => 'Miembro de los grupos',
	'activity' => 'Actividad',
	'activity:activity' => 'Actividad',

);
       
add_translation('es', $Spanish);
