<?php if ($this->session->has_userdata('success')) { ?>

    <div class="alert alert-primary alert-dismissible" role="alert">
        <i class="icon fa fa-check"></i> <strong><?= $this->session->flashdata('success'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>

<?php if ($this->session->has_userdata('warning')) { ?>

    <div class="alert alert-warning alert-dismissible" role="alert">
        <i class="icon fa fa-check"></i> <strong><?= $this->session->flashdata('warning'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>

    <div class="alert alert-danger alert-dismissible" role="alert">
        <i class="icon fa fa-ban"></i> <strong><?= $this->session->flashdata('error'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>