<?php
/**
* Custom translation strings for Cambio Rural
*/
$Spanish = array(
       # 15: change tags to palabras claves
       'tag'      => 'palabra clave',
       'tags'     => 'Palabras claves',
       # TheWire
       'thewire'  => 'Mensajes',
       'thewire:noposts' => 'No hay mensajes.',
       'blog' => 'Informes',
       'informe:blogs' => 'Informes',
       'informe:revisions' => 'Versiones',
       'informe:archives' => 'Archives',
       'informe:blog' => 'Informe',
       'item:object:blog' => 'Informes',
       
       'informe:title:user_informes' => '%s\'s informes',
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
       'river:create:object:blog' => '%s published a informe post %s',
       'river:comment:object:blog' => '%s commented on the informe %s',
       
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
       'informe:noblogs' => 'No informe posts'
);
       
add_translation('es', $Spanish);
