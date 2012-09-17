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
       'thewire:noposts' => 'Buena noticia: no noticias.',
       'blog' => 'Informes',
       'informe:blogs' => 'Informes',
       'informe:revisions' => 'Revisions',
       'informe:archives' => 'Archives',
       'informe:blog' => 'Informe',
       'item:object:blog' => 'Informes',
       
       'informe:title:user_informes' => '%s\'s informes',
       'informe:title:all_informes' => 'All site informes',
       'informe:title:friends' => 'Friends\' informes',
       
       'informe:group' => 'Group informe',
       'informe:enable_informe' => 'Enable group informe',
       'informe:write' => 'Write a informe post',
       
       // Editing
       'informe:add' => 'Add informe post',
       'informe:edit' => 'Edit informe post',
       'informe:excerpt' => 'Excerpt',
       'informe:body' => 'Body',
       'informe:save_status' => 'Last saved: ',
       'informe:never' => 'Never',
       
       // Statuses
       'informe:status' => 'Status',
       'informe:status:draft' => 'Draft',
       'informe:status:published' => 'Published',
       'informe:status:unsaved_draft' => 'Unsaved Draft',
       
       'informe:revision' => 'Revision',
       'informe:auto_saved_revision' => 'Auto Saved Revision',
       
       // messages
       'informe:message:saved' => 'Informe post saved.',
       'informe:error:cannot_save' => 'Cannot save informe post.',
       'informe:error:cannot_write_to_container' => 'Insufficient access to save informe to group.',
       'informe:messages:warning:draft' => 'There is an unsaved draft of this post!',
       'informe:edit_revision_notice' => '(Old version)',
       'informe:message:deleted_post' => 'Informe post deleted.',
       'informe:error:cannot_delete_post' => 'Cannot delete informe post.',
       'informe:none' => 'No informe posts',
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
