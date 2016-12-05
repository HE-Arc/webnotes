<?php

use Illuminate\Database\Seeder;

class NoteReleasesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('notes_releases')->insert(

            array(
                array(
                    'id' => '1',
                    'title' => 'math',
                    'description' => 'notes concernant le cours de math',
                    'content' => 'Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca.',
                    'auteur' => 'steve',
                    'created_at' => '2016-12-03 12:11:11',
                    'updated_at' => '2016-12-03 19:11:11',
                    'note_id' => '1'
                ),

                array(
                    'id' => '2',
                    'title' => 'math',
                    'description' => 'notes concernant le cours de math',
                    'content' => 'Et hanc quidem praeter oppida multa duae civitates exornant Seleucia opus Seleuci regis, et Claudiopolis quam deduxit coloniam Claudius Caesar. Isaura enim antehac nimium potens, olim subversa ut rebellatrix interneciva aegre vestigia claritudinis pristinae monstrat admodum pauca. POIL',
                    'auteur' => 'steve',
                    'created_at' => '2016-12-03 12:11:11',
                    'updated_at' => '2016-12-03 19:11:11',
                    'note_id' => '1'
                ),

                array(
                    'id' => '3',
                    'title' => 'conception os',
                    'description' => 'notes concernant le cours de conception os',
                    'content' => 'Cumque pertinacius ut legum gnarus accusatorem flagitaret atque sollemnia, doctus id Caesar libertatemque superbiam ratus tamquam obtrectatorem audacem excarnificari praecepit, qui ita evisceratus ut cruciatibus membra deessent, inplorans caelo iustitiam, torvum renidens fundato pectore mansit inmobilis nec se incusare nec quemquam alium passus et tandem nec confessus nec confutatus cum abiecto consorte poenali est morte multatus. et ducebatur intrepidus temporum iniquitati insultans, imitatus Zenonem illum veterem Stoicum qui ut mentiretur quaedam laceratus diutius, avulsam sedibus linguam suam cum cruento sputamine in oculos interrogantis Cyprii regis inpegit.',
                    'auteur' => 'nicolas',
                    'created_at' => '2012-12-03 11:11:11',
                    'updated_at' => '2012-12-03 16:11:11',
                    'note_id' => '2'
                ),

                array(
                    'id' => '4',
                    'title' => 'conception os',
                    'description' => 'notes concernant le cours de conception os',
                    'content' => 'Cumque pertinacius ut legum gnarus accusatorem flagitaret atque sollemnia, doctus id Caesar libertatemque superbiam ratus tamquam obtrectatorem audacem excarnificari praecepit, qui ita evisceratus ut cruciatibus membra deessent, inplorans caelo iustitiam, torvum renidens fundato pectore mansit inmobilis nec se incusare nec quemquam alium passus et tandem nec confessus nec confutatus cum abiecto consorte poenali est morte multatus. et ducebatur intrepidus temporum iniquitati insultans, imitatus Zenonem illum veterem Stoicum qui ut mentiretur quaedam laceratus diutius, avulsam sedibus linguam suam cum cruento sputamine in oculos interrogantis Cyprii regis inpegit. POIL',
                    'auteur' => 'nicolas',
                    'created_at' => '2012-12-03 11:11:11',
                    'updated_at' => '2012-12-03 16:11:11',
                    'note_id' => '2'
                ),

                array(
                    'id' => '5',
                    'title' => 'dev web',
                    'description' => 'notes concernant le cours de developpement web',
                    'content' => 'Has autem provincias, quas Orontes ambiens amnis imosque pedes Cassii montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit.',
                    'auteur' => 'daniel',
                    'created_at' => '2000-12-03 20:11:11',
                    'updated_at' => '2000-12-03 22:12:08',
                    'note_id' => '3'
                ),

                array(
                    'id' => '6',
                    'title' => 'dev web',
                    'description' => 'notes concernant le cours de developpement web',
                    'content' => 'Has autem provincias, quas Orontes ambiens amnis imosque pedes Cassii montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit. POIL',
                    'auteur' => 'daniel',
                    'created_at' => '2000-12-03 20:11:11',
                    'updated_at' => '2000-12-03 22:12:08',
                    'note_id' => '3'
                )
            )

        );
    }

}
?>
