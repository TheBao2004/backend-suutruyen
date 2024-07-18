<?php




function htmlChooseImageChap($data = [])
{

foreach ($data as $k => $v):

    $token = uniqid();
    $unique = $token.createSlug($k);
    if (is_array($v)):
?>

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo $unique; ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $unique; ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?php echo $unique; ?>">
                <?php
                    echo $k;
                ?>
            </button>
        </h2>
        <div id="panelsStayOpen-collapse<?php echo $unique; ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?php echo $unique; ?>">
            <div class="accordion-body bg-secondary">

                <?php if (is_array($v)) htmlChooseImageChap($v); ?>

            </div>
        </div>
    </div>


<?php

else:

?>

<div class="item_checkbox_image_chap">
    <div class="d-flex">
    <div class="p-2 align-content-center">
        <div class="checkbox_choose_image">
            <input type="checkbox" value="<?php echo $v; ?>" name="name_checkbox_choose_image[]" id="checkbox<?php echo $unique; ?>">
            <label for="checkbox<?php echo $unique; ?>"></label>
        </div>
    </div>
    <div class="p-2">
        <div class="box_image" style="background-image: url('<?php echo _HOST_ADMIN; ?>/<?php echo _STORAGE; ?>/<?php echo $v; ?>');">

        </div>
    </div>
    </div>
</div>

<?php

endif;

endforeach;

}


?>
