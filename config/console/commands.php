<?php

use Anso\Framework\Console\CommandCollection;
use Anso\Framework\Console\Command\CommandList;

return new CommandCollection(array_merge(
    CommandList::getCommands()
));
