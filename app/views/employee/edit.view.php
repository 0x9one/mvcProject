<style>
    * {
        margin: 0;
        padding: 0;
        border: 0;
        outline: none;
        line-height: 1.2;
        font-size: 1em;
    }

    div.wrapper {
        overflow: hidden;
    }

    div.wrapper div.empForm {
        width: 600px;
    }

    div.wrapper div.employees {
        width: 780px;
        margin: 0 auto;
    }

    form.appForm {
        width: 600px;
        margin: 50px auto;

    }
    form.appForm fieldset {
        border: 1px solid #e4e4e4;
        padding: 10px;
        background-color: #f1f1f1;
    }
    form.appForm legend  {
        background-color: #e4e4e4;
        padding: 5px;
        font: 1em Arial, Helvetica, sans-serif;
        color: #666;
    }

    form.appForm fieldset  p.message {
        background-color: green;
        color: #fff;
        padding: 5px;
        margin: 3px 0;
        border-radius: 3px;
        font: 0.85em Arial, Helvtica, sans-serif;
    }

    form.appForm fieldset p.message.error {
        background-color: #900;
    }

    form.appForm table {
        width: 100%;
    }
    form.appForm label  {
        font-family: Arial;
        font-size: 0.85em;
        color:#666666;
    }

    form.appForm table tr td input[type=text],
    form.appForm table tr td input[type=number]{
        width: 96%;
        padding: 2%;
        font-family: Arial;
        font-size: 0.85em;
    }

    form.appForm table tr td input[type=submit] {
        padding: 8px;
        border-radius: 3px;
        background-color:green;
        color: #fff;
        font-family: Arial;
        font-size: 0.85em;
        cursor: pointer;
    }
    form.appForm table tr td  {
        padding: 3px 0;
    }

    div.wrapper div.employees table {
        width: 800px;
        margin: 20px 20px 0 0;
        border-collapse: collapse;
    }

    div.wrapper div.employees table thead th {
        text-align: left;
        padding: 5px;
        border-right: 2px solid  #e4e4e4;
        border-bottom: 2px solid  #e4e4e4;
        font: bold 0.9em Arial, Helvettica, sans-serif;
        color: #666;
    }

    div.wrapper div.employees table thead th:last-of-type {
        border-right: none;
    }

    div.wrapper div.employees table tbody td {
        text-align: left;
        padding: 5px;
        border-bottom: 1px solid  #e4e4e4;
        font:  0.8em Arial, Helvettica, sans-serif;
        color: #666;
    }

    div.wrapper div.employees table tbody tr:nth-child(2n) td {
        background-color: #f1f1f1;
    }

    div.wrapper div.employees table tbody td a:link,
    div.wrapper div.employees table tbody td a:visited {
        color: #3666ff;
        text-decoration: none;
    }
</style>
<div class="empForm">
    <form class="appForm" method="post"  enctype="application/x-www-form-urlencoded">

        <fieldset>
            <legend>معلومات الموظف :</legend>

            <table>
                <tr>
                    <td><label for="name">إسم الموظف :</label></td>
                </tr>
                <tr>
                    <td>
                        <input required type="text" name="name" id="name" placeholder="Write the employee name here" maxlength="50" value="<?= $employee->name ?>" >
                    </td>
                </tr>
                <tr>
                    <td><label for="age">عمر الموظف :</label></td>
                </tr>
                <tr>
                    <td>
                        <input required type="number" id="age" name="age" min="18" max="60"  value="<?= $employee->age ?>"/>
                    </td>
                </tr>
                <tr>
                    <td><label for="address">عنوان الموظف :</label></td>
                </tr>
                <tr>
                    <td>
                        <input required type="text" name="address" id="address" placeholder="Write the employee Address here" maxlength="100" value="<?= $employee->address ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="salary">راتب الموظف :</label></td>
                </tr>
                <tr>
                    <td>
                        <input required type="number" name="salary" id="salary" step="0.01" min="1500" max="9000" value="<?= $employee->salary ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="tax">ضرائب الموضف :</label></td>
                </tr>
                <tr>
                    <td>
                        <input required type="number" name="tax" id="tax" step="0.01" min="1" max="5" value="<?= $employee->tax ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="حفظ التعديل">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
