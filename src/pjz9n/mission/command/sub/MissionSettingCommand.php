<?php

/**
 * Copyright (c) 2020 PJZ9n.
 *
 * This file is part of Mission.
 *
 * Mission is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Mission is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Mission. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace pjz9n\mission\command\sub;

use CortexPE\Commando\BaseSubCommand;
use pjz9n\mission\form\setting\SettingForm;
use pjz9n\mission\language\LanguageHolder;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class MissionSettingCommand extends BaseSubCommand
{
    public function __construct()
    {
        parent::__construct(
            "setting",
            LanguageHolder::get()->translateString("command.mission.setting.description"),
            ["set", "config"]
        );
    }

    protected function prepare(): void
    {
        $this->setPermission("mission.command.mission.setting");
    }

    public function onRun(CommandSender $sender, string $aliasUsed, array $args): void
    {
        if (!($sender instanceof Player)) {
            LanguageHolder::get()->translateString("command.player.only");
            return;
        }
        $sender->sendForm(new SettingForm());
    }
}
