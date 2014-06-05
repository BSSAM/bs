

    <?PHP foreach($ranges as $range):?>
    <option value="<?PHP echo $range['Range']['id']; ?>"><?PHP echo $range['Range']['range_name']; ?></option>
    <?PHP endforeach; ?>
