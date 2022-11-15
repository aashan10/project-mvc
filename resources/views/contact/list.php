<h1>Contacts</h1>

<ul>
<?php foreach($contacts as $contact) : ?>

<li>
    <a href="/contact/view?id=<?php echo $contact['id']?>">
        <?php echo $contact['name'];?>
    </a>
</li>
<?php endforeach; ?>
</ul>
