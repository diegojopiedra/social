<?php

use Illuminate\Database\Seeder;
use App\Tweet;
use App\HashTag;

class TweetSeeder extends Seeder
{
    private $privateTags = array();
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 202; $i++) { 
            $tweets = rand(5, 15);

            for ($j=0; $j < $tweets; $j++) { 
                $tweet_length = rand(3, 15);            
                $tweet = new Tweet();
                $tweet->text = $this->makeTweet($tweet_length);
                $tweet->user_id = $i;
                $tweet->save();

                while (count($this->privateTags) > 0) {
                    $tweet->hashTags()->save(array_pop($this->privateTags));
                }
            }
            
        }
    }

    private function makeTweet($length = 5){
        $text = '';

        for ($j=0; $j < $length; $j++) { 
            $newWorld = $this->getWorld($j == 0);

            $isHash = rand(0,10) == 0;
            $text .= $isHash?'#':'';
            $text .= $newWorld;
            $text .= ($j == $length-1)?'':' ';

            if($isHash){
                $hashtag = HashTag::find($newWorld);

                if($hashtag == null){
                    $hashtag = new HashTag();
                    $hashtag->tag = $newWorld;
                    $hashtag->save();
                }

                array_push($this->privateTags, $hashtag);
            }
        }

        return $text;
    }

    private function getWorld($first = false){
        $text = 'En un lugar de la mancha, de cuyo nombre no quiero acordarme, no hace mucho timepo vivía un hidalgo de los de lanza en astillero, adarga antigua, rocín flaco y galgo corredor. Una olla de algo más vaca que carnero, salpicón las más noches, duelos y quebrantos de sábado, lentejas los viernes, algún palomino de añadidura los domingos, consumía las tes partes de su hacienda. El esto de ella cincluían sayo de velarte, caza de velludo para las fiestas con sus pantuflos de lo mismo, lso días de entre semana se honraba con su vellorin de lo más fino. Tenía en su casa una ama que pasaba de los cuarenta, y una sobrina que no llegaba a los veinte, y un mozo de campo y plaza, que así ensillaba el rocín como tomaba la podadera. Frisaba la edad de nuestro hidalgo con los cincuenta años, era de complexión recia, seco de carnes, enjuto de rostro; gran madrugador y amigo de la caza. Quieren decir que tenía el sobrenombre de Quijada o Quesada (que en esto hay alguna diferencia en los autores que deste caso escriben), aunque por conjeturas verosímiles se deja entender que se llama Quijana; pero esto importa poco a nuestro cuento; basta que en la narración dél no se salga un punto de la verdad.';

        $arr = explode(' ', $text);
        $n = count($arr);

        $random = rand(0, $n-1);
        $world = $arr[$random];

        $world = $first?ucfirst($world):lcfirst($world);

        return $world;
    }
}
