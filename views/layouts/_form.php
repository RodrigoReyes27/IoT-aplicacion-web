<?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error):?>
                <div><?php echo $error; ?></div>
            <?php endforeach; ?>
        </div>
<?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        
        <?php if ($product['image']): ?>
            <img src="../<?php echo $product['image']; ?>" class="update-image">
        <?php endif; ?>

        <div class="form-group">
            <label>Product Image</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label>Product Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $product['title']; ?>">
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea type="text" name="description" class="form-control"><?php echo $product['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" name="price" step=".01" class="form-control" value="<?php echo $product['price']; ?>">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>