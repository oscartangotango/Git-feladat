    <form action = "?oldal=belep" method = "post">
      <fieldset>
        <legend>Bejelentkezés</legend>
        <input type="text" name="felhasznalo" placeholder="felhasználó" required><br>
        <input type="password" name="jelszo" placeholder="jelszó" required><br>
        <input type="submit" name="belepes" value="Belépés">
        <br>&nbsp;
      </fieldset>
    </form>
    <h3>Regisztrálja magát, ha még nem felhasználó!</h2>
    <form action = "?oldal=regisztral" method = "post">
      <fieldset>
        <legend>Regisztráció</legend>
        <input type="text" name="vezeteknev" placeholder="vezetéknév" required><br>
        <input type="text" name="utonev" placeholder="utónév" required><br>
        <input type="text" name="felhasznalo" placeholder="felhasználói név" required><br>
        <input type="password" name="jelszo" placeholder="jelszó" required><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
        <br>&nbsp;
      </fieldset>
    </form>
