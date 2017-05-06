
<form method="POST" action="pdf.php">

    <h2>Wygeneruj swój bilet lotniczy:</h2>
    <h4>
    <label>
        Lotnisko wylotu:
        <select name="departure">
            <?php
            for ($i = 0; $i < count($airports); $i++) {
                echo "<option>{$airports[$i]['name']}</option>";
            }
            ?>
        </select>
    </label>
    <br>
    <label>
        Lotnisko przylotu:
        <select name="arrival">
            <?php
            for ($i = 0; $i < count($airports); $i++) {
                echo "<option>{$airports[$i]['name']}</option>";
            }
            ?>
        </select>
    </label>
    <br>
    <label>
        Czas wylotu:
        <input type="datetime-local" name="dateTime">
    </label>
    <br>
    <label>
        Długość lotu:
        <input type="number" name="length" min="0" step="1">
        godzin
    </label>
    <br>
    <label>
        Cena lotu:
        <input type="number" name="price" min="0" step="0.01">
        złotych
    </label>
        <br><br>
        <input type="submit" value="GENERUJ" />

    </h4>
</form>

