<h1>Registrierung</h1>
<form method="get" action="index.html" class="wurmisForms">
    <div class="mb-3">
        <label>Vorname *</label> <input type="text" class="form-control" name="surname" required="required">
    </div>
    <div class="mb-3">
        <label>Nachname *</label> <input type="text" class="form-control" name="lastname" required="required">
    </div>
    <div class="mb-3">
        <label>Land</label> <select class="form-control" name="country">
            <option value="austria">
                Österreich
            </option>
            <option value="germany">
                Deutschland
            </option>
            <option value="switzerland">
                Schweiz
            </option>
        </select>
    </div>
    <div class="mb-3">
        <label>Höchste Schulbildung:</label>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="graduation" value="uni"> <label class="form-check-label">Uni/FH</label>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="graduation" value="matura"> <label class="form-check-label">Matura</label>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="graduation" value="lehre"> <label class="form-check-label">Lehre</label>
        </div>
    </div>
    <div class="mb-3">
        <label>Dein Lieblingsplanet:</label> <select class="form-control" name="planets">
            <option value="uranus">
                Uranus
            </option>
            <option value="saturn">
                Saturn
            </option>
            <option value="venus">
                Venus
            </option>
            <option value="jupiter">
                Jupiter
            </option>
            <option value="pluto">
                Pluto
            </option>
        </select>
    </div>
    <div class="mb-3">
        <label>Welche der folgenden Bücher hast Du schon gelesen:</label>
        <div class="mb-3">
            <input class="form-check-input" type="checkbox" name="checkbox_got" value="got"> <label class="form-check-label">Game Of Thrones</label>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="checkbox" name="checkbox_hp" value="hp"> <label class="form-check-label">Harry Potter</label>
        </div>
    </div>
    <div class="mb-3">
        <label>Welche Programmiersprachen hast du bereits verwendet:</label>
        <div class="mb-3">
            <input class="form-check-input" type="checkbox" name="checkbox_javascript" value="got"> <label class="form-check-label">Javascript</label>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="checkbox" name="checkbox_c#" value="c#"> <label class="form-check-label">C#</label>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="checkbox" name="checkbox_php" value="php"> <label class="form-check-label">PHP</label>
        </div>
    </div>
    <div class="mb-3">
        <label>Willst du einen Newsletter beziehen?</label>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="newsletter" value="yes"> <label class="form-check-label">Ja</label>
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="newsletter" value="no"> <label class="form-check-label">Nein</label>
        </div>
    </div>
    <div class="mb-3">
        <label>Deine E-Mail</label> <input type="email" class="form-control" name="email" placeholder="max.mustermann@mustermail.com">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
