<div class="column-responsive column-80">
    <div class="users form content">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Registration') ?></legend>
            <?php
            echo $this->Form->control('first_name', ['required' => false]);
            echo $this->Form->control('last_name', ['required' => false]);
            echo $this->Form->control('phone', ['required' => false]);
            echo $this->Form->control('email', ['required' => false]);
            echo $this->Form->control('password', ['required' => false]);
            echo $this->Form->control('confirm_password', ['required' => false]);
            echo $this->Form->control('gender', array('type' => 'radio'));
            echo $this->Form->radio('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], ['required' => false]);

            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
</div>
<!-- <style>
    
</style> -->