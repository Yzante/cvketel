<form id="T_input" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <style>
        .error {color: #FF0000;}
    </style>
        <table>
            <tr>
                <td>
                    Voornaam
                </td>
                <td>
                    <input type="text" name="voornaam" required="true">
                    <span class="error">* <?php echo $voornaamErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Achternaam
                </td>
                <td>
                    <input type="text" name="achternaam" required="true">
                    <span class="error">* <?php echo $achternaamErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="email" name="email" required="true">
                    <span class="error">* <?php echo $emailErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    geboortedatum
                </td>
                <td>
                    <input type="date" value="2000-01-10" name="geboortedatum" required="true">
                    <span class="error">* <?php echo $geboortedatumErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    Zaterdag
                </td>
                <td>
                    <input type="checkbox" name="zaterdag"> 25 euro
                </td>
            </tr>
            <tr>
                <td>
                    zondag
                </td>
                <td>
                    <input type="checkbox" name="zondag"> 25 euro
                </td>
            </tr>
            <tr>
                <td>
                    maandag
                </td>
                <td>
                    <input type="checkbox" name="maandag"> 25 euro
                </td>
            </tr>
            <tr>
                <td>
                    dinsdag
                </td>
                <td>
                    <input type="checkbox" name="dinsdag"> 25 euro
                </td>
            </tr>
        </table>
        <input type="checkbox" name="algemene_voorwaarden">
         Ik ga accoord met de algemene voorwaarden
        <span class="error">* <?php echo $algemene_voorwaardenErr;?></span>
        <br>
        <input type="submit">
</form>
