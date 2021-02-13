<div class="right_side_container">
    <div class="page_header posts_header flex">
        <div class="flex">
            Przepisy
            <div class="add_new">
                <a href="recipe" class="flex">
                    <div class="add_new_text">Dodaj</div>
                    <div class="add_new_icon">+</div>
                </a>
            </div>
        </div>
        <div class="search_container flex">
            <input class="search_input" placeholder="Szukaj...">
            <div class="search_icon">
                <img src="icon" alt="search-icon"/>
            </div>
        </div>
    </div>
    <div class="posts_container">
        <table>
            <thead>
                <th>ID</th>
                <th>Tytuł</th>
                <th>Kategorie</th>
                <th>Data publikacji</th>
                <th>Status</th>
            </thead>
            <tbody>
            <?php
                $i=0;
                foreach($posts as $post) {
                    if($i%2==0)
                        echo("<tr class='data alternate'>");
                    else
                        echo("<tr class='data'>");

                    echo "<td class='post_data'>".$post->getId()."</td>";
                    echo "<td class='post_data post_title'><a href=\"recipe/".$post->getLink()."\">".$post->getTitle()."</a></td>";
                    echo "<td class='post_data'>".$post->getCategories()."</td>";
                    echo "<td class='post_data'>".$post->getDate()."</td>";
                    echo "<td class='post_status flex'>";
                        if($post->getStatus() == 'active')
                            echo "<div class='status_box active'>Aktywny</div>";

                        if($post->getStatus() == 'inactive')
                            echo "<div class='status_box inactive'>Nieaktywny</div>";

                        if(strtotime($post->getDate()) > strtotime('now'))
                            echo "<div class='status_box unpublished'>Zaplanowany</div>";


                    echo "</td>";

                    echo("</tr>");
                    $i++;
                }
            ?>
            </tbody>
        </table>
    </div>
</div>