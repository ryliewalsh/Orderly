<div id="text">
    <form method="post" action="chore_handler.php">
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
        </div>
        <div>
            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date">
        </div>
        <div>
            <label for="is_recurring">Recurring:</label>
            <input type="checkbox" id="is_recurring" name="is_recurring" value="1">
        </div>

        <input type="submit" value="Submit">
    </form>
</div>
