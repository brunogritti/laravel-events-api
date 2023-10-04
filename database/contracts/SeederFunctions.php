<?php

namespace Database\Contracts;

trait SeederFunctions
{
    //TODO: criar parametro force que remove (atualiza) e adiciona tudo zerado
    public function populateDatabase(Array $objects, String $modelname, Array $filterColumns, $askDelete = false)
    {
        $seedingCounter = 0;
        $foundObjects = [];

        foreach ($objects as $key => $object) {
            try {
                $conditions = [];
                foreach ($filterColumns as $key => $filterColumn) {
                    array_push($conditions, [$filterColumn, $object[$filterColumn]]);
                }
                $foundObject = $modelname::where($conditions)->first();
                if ($foundObject) array_push($foundObjects, $foundObject);
                if (!$foundObject) {
                    \DB::table((new $modelname)->getTable())->insert($object);
                    $seedingCounter++;
                }
            } catch (\Throwable $th) {
                $this->command->info('');
                $this->command->info("<fg=cyan>".implode(' - ', $object));
                $answer = $this->command->ask("O elemento da seeder acima está diferente do banco, deseja atualizar? (y/n) ");
                if ($answer == 'y') {
                    \DB::table((new $modelname)->getTable())
                                ->where('id',$object['id'])
                                ->update($object);
                } else {
                    continue;
                }
            }
        }

        if (\DB::table((new $modelname)->getTable())->count() != count($objects)) {
            $nonExistingObjects = \DB::table((new $modelname)->getTable())->whereNotIn('id', array_column($foundObjects, 'id'))->get('id');

            $this->command->info('<fg=yellow>Os seguintes registros da tabela ' .(new $modelname)->getTable() . ' não estão na seeder, certifique-se que podem ter sido inseridos via CRUD da plataforma ou remova: ' . $nonExistingObjects);

            $answer = '';
            if ($askDelete) $answer = $this->command->ask("Deseja remover os registros que não estão na seeder? (sim/n) ");
            if ($answer == 'sim') {
                \DB::table((new $modelname)->getTable())
                            ->whereIn('id', array_column($nonExistingObjects->toArray(), 'id'))
                            ->delete();
                
                $this->command->info('<fg=yellow>' . count($nonExistingObjects) . ' Registros removidos');
            }
        }

        if ($seedingCounter > 0) {
            $this->command->info($seedingCounter . ' novos registros foram adicionados à tabela: ' . (new $modelname)->getTable());
        } else {
            $this->command->info('<fg=cyan>Não há novos registros para a tabela: ' . (new $modelname)->getTable());
        }
    }
}
