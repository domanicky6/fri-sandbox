# fri-sandbox
Zdravím

Pripravil som pre vás pieskovisko na ktorom si môžte vyskúšať prácu s Nette.
Pieskovisko obsahuje:
 * Nette 2.3
 * Dibi
 * Grido

Ďalej obsahuje jednoduchý príklad ktorý by mal byť dostupný na adrese `http://localhost/fri-sandbox/article/list`. Pokiaľ si ho chcete vyskúšať, importujte si do svojej lokálnej DB sql zo zložky `app/db`

## Cieľ
Cieľom tohto zadania je zaškoliť nových študentov do projektu Portál FRI. Na jednoduchej aplikácii by si mali osvojiť konvencie a postupy, ktoré budú potrebovať pri vývoji, testovaní a nasadzovaní aplikácie.

## Pokyny
V prvom rade je potrebné, aby ste si forkli tento repozitár (tlačidlo Fork v pravo hore) aby ste mohli ďalej pracovať na zadaní.

Potom by ste mali mať kópiu tohto repozitára vo vlastnom účte.

Ďalej je potrebné aby ste si projekt rozbehali lokálne, princíp bude podobný ako je popísaný v príručke na inštaláciu portálu (clone, nainštalovanie závislostí pomocou composera). Len jedna dôležitá poznámka, klonovať si budete svoj repozitár takže niečo ako `https://github.com/vášNick/fri-sandbox.git`.

Potom si musíte nastaviť pripojenie k databáze, tento repozitár obsahuje `config.local.sample`, podľa ktorého si to môžte nastaviť aj vy.

## Zadanie
Vytvorte aplikáciu, ktorá bude spravovať používateľov a ich skupiny. Pre vstup do administrácie, je nutné sa prihlásiť. Ak používateľ nemá konto, ponúknite mu možnosť zaregistrovať sa.

**Entity:**
  - používateľ
    - id (int, unikátny)
    - meno (string, max 64 znakov)
    - priezvisko (string, max 64 znakov)
    - email (string, unikátny, max 64 znakov)
    - vek (int, rozsah od 15 do 100)
    - heslo (string, max 64 znakov)
    - dátum posledného prihlásenia (datetime)
  - skupina
    - id (int, unikátny)
    - nazov (string, unikátny, max 64 znakov)
    - popis (string, text)

**Stránka bude pozostávať z týchto častí:**
  - prihlasovacia stránka (SignPresenter)
    - zobrazí prihlasovací formulár (email, heslo)
  - domovska stránka (HomepagePresenter):
    - stránka zobrazí vyhľadávacie pole (like google), do ktorého používateľ môže zadať meno alebo email reg. používateľa alebo názov skupiny používateľov
    - po odoslaní vyhľadávaného výrazu, sa stránka pokúsi nájsť používateľov a zobrazí ich na rovnakej stránke pod vyhľadávacim poľom (AJAX? :-) ).
    - o každom nájdenom používateľovi zobrazte info a vypíšte skupiny, do kt. patrí
    - na stránke je umiestnený link na prihlásenie / odhásenie a administráciu používateľov a skupín používateľov
  - správa používateľov (UserPresenter)
    - stránka zobrazí grid používateľov, ktorý bude pre každého používateľa zorazovať:
      - meno a priezvisko používateľa
      - email používateľa
      - dátum posledného prihlásenia
      - možnosť zmazať používateľa
  - správa používateľských skupín (UserGroupPresenter)
    - stránka zobrazí grid skupín, ktorý bude pre každú skupinu zobrazovať:
      - názov skupiny
      - popis skupiny
      - počet používateľov v skupine
      - možnosť pridať / odobrať sa do skupiny (aktuálne prihlásený používateľ)
      - možnosť editovať, zmazať skupinu
      
## Požiadavky na aplikáciu
1. napísaná objektovo v Nette frameworku s databázovou vrstvou Dibi
2. klientská strana napísaná v jQuery
3. používateľsky prívetivá
4. naformatovaný kód, scripty a šablóny (dodržiavanie odsadení, názvosloví, CamelCase, EN (popisky a správy pre používateľov v SK - programujete pre Slovákov :-) )
5. každá trieda samostatný súbor (interface alebo exception môže byť aj súčasťou inej triedy, ak táto súvisí s danou triedou a mimo nej sa nepoužíva)
6. každá komponenta a formulár je samostatná trieda
7. vyhýbanie sa viacnásobnému vnorovaniu kódu (max. 2-3 úrovne, inak musíte mať fest dobrú výhovorku :-D )
8. každý študent zverejní aplikáciu ako aj celý jej vývoj na svojom účte GitHubu. Myslí sa tým to, že používajte GitHub **počas celého vývoja a commitujte jednotlivé časti postupne, nie všetko naraz**. Pozor, po každom commite, musí byť aktuálna verzia stránky spustiteľná.
9. databázu (SQL kód) nahrávajte rovnako na GitHub

## Dôležité linky
- [Nette framework dokumentácia](https://doc.nette.org/cs/2.3/)
- [Dibi dokumentácia](http://dibiphp.com/)
- [Git dokumentácia](http://git-scm.com/documentation)
- [jQuery dokumentácia](http://api.jquery.com/)
- [Konvencie Portálu FRI](https://www.fri.uniza.sk/admin/guide/conventions)
- [Inštalačná príručka (nasadzovanie novej verzie)](https://www.fri.uniza.sk/admin/guide/instalation)
- [Programátorská príručka Portálu FRI](https://www.fri.uniza.sk/admin/guide/manual)

## Rada na záver
Ak ste ešte nikdy nerobili v nette alebo inom php frameworku tak odporúčam si prejsť aj [quickstart](https://doc.nette.org/cs/2.3/quickstart) ale netreba ísť podľa neho doslovne, ak ho plánujete skúšať na tomto sandboxe pretože on nevyužíva dibi ale nette database ktorá funguje trochu inak ako dibi.
