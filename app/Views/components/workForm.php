<div class="form-group">
    <label class="col-sm-2 control-label">Name your work (*)</label>
    <div class="col-sm-10">
        <input  type="text" class="form-control" id="work-name" name="work_name" placeholder="Work name"
                value="<?php echo (isset($data)) ? htmlspecialchars($data['work_name']) : ''?>"
                maxlength="255"
                required>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Start date (*)</label>
    <div class="col-sm-10">
        <input  type="datetime-local" class="form-control" id="start-date" name="start_date" placeholder="Start date (YYYY-MM-DD H:i:s)"
                value="<?php echo (isset($data)) ? htmlspecialchars($data['start_date']) : ''?>"
                required>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">End date (*)</label>
    <div class="col-sm-10">
        <input  type="datetime-local" class="form-control" id="end-name" name="end_date" placeholder="End date (YYYY-MM-DD H:i:s)"
                value="<?php echo (isset($data)) ? htmlspecialchars($data['end_date']) : ''?>"

                required>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Status (*)</label>
    <div class="col-sm-10">
        <select id="status" name="status">
            <option value="0">Planning</option>
            <option value="1">Doing</option>
            <option value="2">Complete</option>
        </select>
    </div>
</div>
