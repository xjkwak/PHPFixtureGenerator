<?php
/**
 * Created by PhpStorm.
 * User: mojix
 * Date: 07-03-18
 * Time: 06:34 AM
 */

class FixtureGenerator
{

    public static function generate($teamNames) {
        $teams = range(0,count($teamNames) - 1);
        shuffle($teams);
        $E = count($teams);
        $f = $E - 1;
        $c = $E / 2;

        $partidos = array();

        for ($i = 0; $i < $c; $i++) {
            for ($j = 0; $j < $f; $j++) {
                $partidos[] = array(
                    'team1' => $teamNames[$teams[$j]],
                    'team2' => ''
                );
            }
        }

        $last = $teams[$f];

        $k = $f-1;

        $semana = 0;
        for ($i = 0; $i < count($partidos); $i++) {
            if ($i % $c == 0) {
                $otro = $last;
                $semana++;
            }
            else {
                if ($k < 0) {
                    $k = $f - 1;
                }
                $otro = $teams[$k];
                $k--;
            }
            $partidos[$i]['semana'] = $semana;
            $partidos[$i]['id'] = $i+1;
            $partidos[$i]['team2'] = $teamNames[$otro];
        }

        return $partidos;
    }
}


$teamNames = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P');
$teamNames = array('A', 'B', 'C', 'D', 'E', 'F');
$partidos = FixtureGenerator::generate($teamNames);

print_r($partidos);