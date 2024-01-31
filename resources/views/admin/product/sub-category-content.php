<label for="large-input" class="col-sm-2 col-form-label text-center">Sub Category Name</label>
<div class="col-sm-10">
    <select name="sub_category_id" class="form-control">
        <?php foreach ($subCategoriesByCategoryId as $subCategoryByCategoryId) { ?>
            <option value="<?php echo $subCategoryByCategoryId->id; ?>"><?php echo $subCategoryByCategoryId->sub_category_name; ?></option>
        <?php } ?>
    </select>
</div>
