<div class="bcf">
  <?php if ($success): ?>
    <?php if ($title): ?>
      <h3 class="bcf-title"><?= __('Thanks for your request!', 'basic-contact-form') ?></h3>
    <?php endif; ?>
    <?php if ($description): ?>
      <p class="bcf-description"><?= __('We\'ll get back to you as soon as we can.', 'basic-contact-form') ?></p>
    <?php endif; ?>
  <?php else: ?>
    <?php if ($title): ?>
      <h3 class="bcf-title"><?= $title ?></h3>
    <?php endif; ?>
    <?php if ($description): ?>
      <p class="bcf-description"><?= $description ?></p>
    <?php endif; ?>
      <form class="bcf-form" method="POST">
        <?php if (in_array('name', $fields)) : ?>
          <p class="bcf-field form-group">
            <label class="bcf-label">
              <?= __('Name', 'basic-contact-form') ?><?= in_array('name', $required) ? '*' : ''; ?>
            </label>
            <input class="form-control bcf-input-text bcf-name <?= $errors['name'] ? 'bcf-error is-invalid' : '' ?>" placeholder="<?= __('Please enter your name', 'basic-contact-form') ?>" type="text" name="name" size="50" maxlength="80" value="<?= $data['name'] ?>" />
            <?php if (array_key_exists('name', $errors)): ?>
              <span class="invalid-feedback bcf-message bcf-error"><?= $errors['name'] ?></span>
            <?php endif; ?>
          </p>
        <?php endif; ?>
        <?php if (in_array('email', $fields)) : ?>
          <p class="bcf-field form-group">
            <label class="bcf-label">
              <?= __('E-mail', 'basic-contact-form') ?><?= in_array('email', $required) ? '*' : ''; ?>
            </label>
            <input class="form-control bcf-input-text bcf-email <?= $errors['email'] ? 'bcf-error is-invalid' : '' ?>" placeholder="<?= __('Please enter your e-mail address', 'basic-contact-form') ?>" type="text" name="email" size="50" maxlength="80" value="<?= $data['email'] ?>" />
            <?php if (array_key_exists('email', $errors)): ?>
              <span class="invalid-feedback bcf-message bcf-error"><?= $errors['email'] ?></span>
            <?php endif; ?>
          </p>
        <?php endif; ?>
        <?php if (in_array('subject', $fields)) : ?>
          <p class="bcf-field form-group">
            <label><?= __('Subject', 'basic-contact-form') ?><?= in_array('subject', $required) ? '*' : ''; ?></label>
            <input class="form-control bcf-input-text bcf-subject <?= $errors['subject'] ? 'bcf-error is-invalid' : '' ?>" placeholder="<?= __('Please enter a subject', 'basic-contact-form') ?>" type="text" name="subject" size="50" maxlength="256" value="<?= $data['subject'] ?>" />
            <?php if (array_key_exists('subject', $errors)): ?>
              <span class="invalid-feedback bcf-message bcf-error"><?= $errors['subject'] ?></span>
            <?php endif; ?>
          </p>
        <?php endif; ?>
        <?php if (in_array('message', $fields)) : ?>
          <p class="bcf-field form-group">
            <label class="bcf-label">
              <?= __('Message', 'basic-contact-form') ?><?= in_array('message', $required) ? '*' : ''; ?>
            </label>
            <textarea class="form-control bcf-input-textarea bcf-message <?= $errors['message'] ? 'bcf-error is-invalid' : '' ?>" placeholder="<?= __('Please enter a message', 'basic-contact-form') ?>" name="message" size="50" rows="8"><?= $data['message'] ?></textarea>
            <?php if (array_key_exists('message', $errors)): ?>
              <span class="invalid-feedback bcf-message bcf-error"><?= $errors['message'] ?></span>
            <?php endif; ?>
          </p>
        <?php endif; ?>
        <p class="bcf-footer">
          <button class="btn btn-primary bcf-submit" type="submit"><?= __('Send', 'basic-contact-form'); ?></button>
        </p>
      </form>
    <?php endif; ?>
</div>
