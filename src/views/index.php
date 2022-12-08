<form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="receipt"/>
        <button type="submit">Upload</button>
</form>

<div>
        <?php if (! empty($users)): ?>
                User ID:    <?= htmlspecialchars($users['email'], ENT_QUOTES) ?> <br/>
                User Email: <?= htmlspecialchars($users['full_name'], ENT_QUOTES) ?> <br/>
                User Name:  <?= htmlspecialchars($users['Is_active'], ENT_QUOTES) ?> <br/>
                User Is Active: <?= htmlspecialchars($users['created_at'], ENT_QUOTES) ?> <br/>
        <?php endif ?>
        
        <?php
                var_dump($users); 
        ?>  
</div>