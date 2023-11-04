<div class="form-group">
	<label>Name</label>
	<div>
		<?= @$contactData['name']; ?>
	</div>
</div>


<div class="form-group">
	<label>Email</label>
	<div>
		<?= @$contactData['email']; ?>
	</div>
</div>

<div class="form-group">
	<label>Phone</label>
	<div>
		<?= @$contactData['phone']; ?>
	</div>
</div>

<div class="form-group">
	<label>Subject</label>
	<div>
		<?= @$contactData['subject']; ?>
	</div>
</div>
<div class="form-group">
	<label>Message</label>
	<div>
		<?= @$contactData['message']; ?>
	</div>
</div>
<div class="form-group">
	<label>Date</label>
	<div>
		<?= date('d M Y H:i A',strtotime($contactData['created_at'])); ?>
	</div>
</div>