<?php

namespace View;

class ViewMentionsLegales extends View
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function display(): void
    {
        ob_start();
?>

        <nav aria-label="breadcrumb">
            <ul>
                <li aria-label="Accueil"><a href="<?= $_ENV['accueil'] ?>">Accueil</a></li>
                <li aria-current="page"><a>Mentions Légales</a></li>
            </ul>
        </nav>

        <main>

            <h1>Mentions légales</h1>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque iste cum id illum facere delectus odio! Consequatur, magnam aperiam. Corrupti accusantium deleniti deserunt libero nulla laboriosam consectetur, nostrum ipsum impedit facere quibusdam, quia itaque nobis cupiditate, ad nihil sint fugiat ducimus neque unde quam laudantium tempore quasi! Reiciendis cumque minus, deleniti quisquam porro facilis, similique quam perspiciatis officiis labore expedita vitae, placeat laboriosam. Consectetur voluptas eum nostrum eveniet dicta in voluptatem, animi hic eaque ea praesentium cupiditate deleniti ipsa minima omnis sapiente necessitatibus quaerat officia quos maxime rerum cum. Rem sunt sint quidem impedit possimus fugiat eos magnam tempore aspernatur unde ab voluptatum ullam rerum labore deserunt vero sapiente nam, saepe repudiandae. Sunt eum quis ullam illo dicta voluptatem labore necessitatibus ipsum, a ipsa eius, veniam mollitia veritatis fuga inventore error explicabo officiis assumenda! Illum tempore cumque fugit aut, rem modi ratione fugiat sequi quasi et possimus quisquam qui necessitatibus vitae magnam laboriosam autem nobis voluptatum vero? Dolor consequuntur soluta quasi tenetur! Saepe fugit, explicabo molestias quod harum libero aliquid veritatis impedit minima facere, voluptates repellendus officia perferendis! Beatae vel sed soluta dolore dignissimos et voluptatum voluptatibus facilis rerum doloremque similique in, id, laboriosam possimus ullam magnam nihil sapiente assumenda deserunt dolorum ratione sint provident voluptates nisi. Et minus nobis corrupti similique, incidunt suscipit temporibus fuga tempora eaque ab rem enim atque obcaecati consequuntur sapiente deleniti perferendis fugiat necessitatibus. Eveniet, nesciunt! Qui nisi sit libero, eum natus eveniet deserunt ab neque numquam doloremque sequi sapiente modi minus cupiditate illo magnam praesentium similique. Provident dicta eaque sapiente tempora soluta quod pariatur nemo atque dolor, perferendis odit quasi nisi assumenda optio nulla! Distinctio molestias autem atque sit enim mollitia cum quia aspernatur, labore et officia nisi delectus laudantium vero error, voluptate hic pariatur, voluptatum sed blanditiis ea beatae harum corrupti? Minus autem officiis placeat ipsam tempora labore explicabo odio possimus, soluta recusandae doloribus eaque ullam deleniti sed, quibusdam temporibus reiciendis sunt voluptatibus ad dolorum? Reiciendis vel sapiente nostrum suscipit fugit? Ex illo perspiciatis officiis modi minima, ipsa vitae dolorum veritatis reiciendis quia commodi. Laboriosam impedit aspernatur ullam delectus earum. Autem dolorem esse deserunt assumenda officiis eaque, ea molestias quas, aliquam dolores quasi ab sapiente perspiciatis! Nulla consectetur nostrum tempore repellendus dicta voluptas eaque natus unde assumenda officia! Aliquid, reprehenderit officiis quibusdam nulla numquam nihil nisi quam odit, error consequatur quisquam? Dolorem id quaerat, facilis corporis veniam molestias eius. Itaque, totam earum. A aliquam labore beatae totam, inventore cumque iusto nostrum placeat sequi at fugit! Ducimus ad ab minima excepturi reprehenderit. Ab ducimus obcaecati aspernatur odit saepe itaque suscipit, mollitia magnam repellat tempora odio esse totam neque sunt quo ipsum fugit nihil sint dolorum, aperiam provident illum nulla tenetur culpa. Minus autem ullam asperiores similique, iste incidunt error, quos ex illum deleniti corrupti quod nostrum itaque. Maxime molestias eos eligendi nobis dolor quam molestiae est laborum, quisquam, ab beatae, quo tempore deleniti iure suscipit laudantium impedit doloribus veritatis? Possimus doloremque debitis, consectetur minus in sapiente itaque dolore error reiciendis? Aspernatur aliquid totam temporibus.</p>


        </main>


<?php
        ob_end_flush();
    }
}
