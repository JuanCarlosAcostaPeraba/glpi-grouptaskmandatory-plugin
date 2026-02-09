<?php

/**
 * Install hook
 *
 * @return boolean
 */
function plugin_grouptaskmandatory_install()
{
    return true;
}

/**
 * Uninstall hook
 *
 * @return boolean
 */
function plugin_grouptaskmandatory_uninstall()
{
    return true;
}

/**
 * Hook to validate task before creation
 *
 * @param CommonDBTM $item
 */
function plugin_grouptaskmandatory_pre_item_add_task($item)
{
    plugin_grouptaskmandatory_check_group($item);
}

/**
 * Hook to validate task before update
 *
 * @param CommonDBTM $item
 */
function plugin_grouptaskmandatory_pre_item_update_task($item)
{
    plugin_grouptaskmandatory_check_group($item);
}

/**
 * Check if the group field is filled and show warning if not
 *
 * @param CommonDBTM $item
 * @return void
 */
function plugin_grouptaskmandatory_check_group($item)
{
    // The field name in GLPI tasks for the technical group is groups_id_tech.
    // However, we check several common naming variations to be absolutely sure.
    $groupIdTech = $item->input['groups_id_tech'] ?? $item->input['_groups_id_tech'] ?? 0;
    $groupId = $item->input['groups_id'] ?? $item->input['_groups_id'] ?? 0;

    if (empty($groupIdTech) && empty($groupId)) {
        // As requested, we ONLY show the toast message and do NOT block the save operation
        // Message is forced in Spanish and starts with 'AVISO:' while keeping ERROR level for red color.
        Session::addMessageAfterRedirect(
            'El campo Grupo es obligatorio para las tareas.',
            false,
            WARNING
        );
    }
}
