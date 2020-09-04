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
        float: left;
    }

    div.wrapper div.employees {
        width: 780px;
        margin: 0 auto;
    }

    form.appForm {
        width: 400px;
        margin: 20px 50px 0 20px;

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

<div class="wrapper">

    <div class="employees">
        <?php if (isset($_SESSION['message'])) {?>
            <p class="message <?= isset($error) ? 'error' : '' ?>"><?= $_SESSION['message'] ?></p>
            <?php

            unset($_SESSION['message']);

        }?>
        <a href="/employee/add"><?= $text_add_employee  ?></a>
        <table>
            <thead>
            <tr>
                <th><?= $text_employee_name ?></th>
                <th><?= $text_employee_age ?></th>
                <th><?= $text_employee_address ?></th>
                <th><?= $text_employee_tax ?></th>
                <th><?= $text_control ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (false !== $employees) {
                foreach ($employees as $employee) {
                    ?>
                    <tr>
                        <td><?= $employee->name ?></td>
                        <td><?= $employee->age ?></td>
                        <td><?= $employee->address ?></td>
                        <td><?= $employee->tax ?></td>
                        <td>
                            <a href="/employee/edit/<?= $employee->id ?>">تعديل</a>
                            <a href="/employee/delete/<?= $employee->id ?>" onclick="if (!confirm('<?= $text_confirm_delete ?>')) return false;">مسح</a>
                        </td>
                    </tr>
                    <?php
                }
            }else {
                ?>


                <td colspan="5"><p>أسف قائمة الموظفن فارغة</p></td>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

