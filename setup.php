<?php

/**
 * -------------------------------------------------------------------------
 * grouptaskmandatory plugin for GLPI
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of grouptaskmandatory.
 *
 * grouptaskmandatory is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * grouptaskmandatory is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with grouptaskmandatory. If not, see <http://www.gnu.org/licenses/>.
 * -------------------------------------------------------------------------
 * @author    Juan Carlos Acosta Peraba
 * @copyright Copyright (C) 2026 Juan Carlos Acosta Peraba
 * @license   GPLv2+
 * @link      https://github.com/JuanCarlosAcostaPeraba/glpi-grouptaskmandatory-plugin
 * -------------------------------------------------------------------------
 */

define('PLUGIN_GROUPTASKMANDATORY_VERSION', '1.0.0');

/**
 * Init the plugin of the array of plugins
 *
 * @return void
 */
function plugin_init_grouptaskmandatory()
{
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['grouptaskmandatory'] = true;

    if (Plugin::isPluginActive('grouptaskmandatory')) {
        $PLUGIN_HOOKS['pre_item_add']['grouptaskmandatory'] = [
            'TicketTask' => 'plugin_grouptaskmandatory_pre_item_add_task'
        ];

        $PLUGIN_HOOKS['pre_item_update']['grouptaskmandatory'] = [
            'TicketTask' => 'plugin_grouptaskmandatory_pre_item_update_task'
        ];
    }
}

/**
 * Get the name and the version of the plugin
 *
 * @return array
 */
function plugin_version_grouptaskmandatory()
{
    return [
        'name' => 'Mandatory Group Task',
        'version' => PLUGIN_GROUPTASKMANDATORY_VERSION,
        'author' => 'Juan Carlos Acosta Peraba',
        'license' => 'GPLv2+',
        'homepage' => 'https://github.com/JuanCarlosAcostaPeraba/glpi-grouptaskmandatory-plugin',
        'requirements' => [
            'glpi' => [
                'min' => '11.0',
                'max' => '12.0',
            ],
        ],
    ];
}

/**
 * Check pre-requisites before install
 *
 * @return boolean
 */
function plugin_grouptaskmandatory_check_prerequisites()
{
    return true;
}

/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message or not
 * @return boolean
 */
function plugin_grouptaskmandatory_check_config($verbose = false)
{
    return true;
}
