<?php include 'include/header.php' ?>

<div class="focus row">
    <img src="images/focus3.jpg" />
</div>

<div class="row">
    <div class="col-xs-4 col-weight">
        <h2>Upcoming Events</h2>
        <ul class="col-list content">
            <li>
                <a href="#" class="">
                    <img src="images/event1.jpg" />
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <img src="images/event3.jpg" />
                </a>
            </li>
        </ul>
    </div>
    <div class="col-xs-4 col-weight">
        <h2>About NTUDL</h2>
        <div class="content">
            <p>The history of Nanyang Technologcal University CAC Dragon & Lion Dance Troupe can be traced back to 1991, when the NTU Pugilistic & Lion Dance Troupe was formed. Since then, with the addition of the Dragon Section into the ever-expanding sub-club of NTU Cultural Activities Club, and the splitting of the Pugilistic Section, The NTU CAC Dragon & Lion Dance Troupe was formally formed in July 2003, and now is a Tier-1 member club of NTU Cultural Activities Club (CAC).</p>
            <p><a href="about.php">READ MORE...</a></p>
        </div>
    </div>
    <div class="col-xs-4 col-weight">
        <h2>Gallery</h2>
        <div id="facebook-gallery" class="gallery-small content">
            Loading gallery...
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            "url": "gallery/ajax_get_gallery.php",
            "type": "GET",
            "success": function(ret) {
                var $gallery = $("#facebook-gallery");
                $gallery.html("");
                for (var i in ret) {
                    var photo = ret[i];
                    console.log(photo);
                    var $photo = $("<a>");
                    $photo.attr({
                        "href": photo['source'],
                        "data-lightbox": "gallery",
                        "data-title": "<a target='_blank' href='javascript:openNew(\"" + photo['link'] + "\")'>View on Facebook</a>"
                    });
                    $photo.html('<img src="' + photo['source'] + '" />');
                    $gallery.append($photo);
                }
            }
        });
    });

    function openNew(link) {
        window.open(link);
    }

</script>

<?php include 'include/footer.php' ?>