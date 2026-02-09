# Mandatory Group Task for GLPI 11

This plugin ensures that the "Group" field is mandatory for all tasks (Ticket, Change, and Problem) in GLPI 11.

## Features
- Prevents saving tasks without a technician group assigned.
- Supports TicketTask, ChangeTask, and ProblemTask.
- Displays a clear error message in the user's language (Spanish/English).
- Compatible with GLPI 11.

## Installation
1. Copy the `grouptaskmandatory` folder to your GLPI `plugins` directory.
2. Go to **Setup > Plugins** in GLPI.
3. Find **Mandatory Group Task**, click **Install** and then **Enable**.

## Author
Juan Carlos Acosta Peraba
