<?php

namespace AmuzThemes\ApplicationInstall\Database\Factories;

use AmuzThemes\ApplicationInstall\Models\AppRelease;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AppReleaseFactory extends Factory
{
    protected $model = AppRelease::class;
    public function definition(): array
    {
        $os = Arr::random(['ios','aos']);
        $version = fake()->semver();

        return [
            'is_public' => fake()->boolean(),
            'os_type' => $os,
            'min_os_version' => $os == 'ios' ? '16' : '13',
            'version_code' => $version,
            'build_number' => AppRelease::query()->where('os_type',$os)->max('build_number') + 1,
            'install_url' => $os == 'ios' ? '/applications/ios/'.Str::replace(".","_",$version).'/info.plist' : '/applications/aos/'.Str::snake($version).'/app.apk',
            'status' => Arr::random(['stable','beta','dev','arch']),
            'content' => Arr::random($this->markdown()),
            'publish_at' => Carbon::now()
        ];
    }

    private function markdown(): array
    {
        return [
            '# Veniente rubor colla sudor discedere

## Monstra casa

Lorem markdownum ingens ab ubi plangoris lactis sitae primus, unam hac carpere
dolor sit positisque! **Docebo blanditias**, tot ursi, notum magno nullos
admissum teneat levatae pedicis facietque celsoque et?

    signature_clip = 4;
    if (port.graymailAlphaBar(3)) {
        overwrite += digital(4, unmountCyberbullyingDrag);
    }
    var googleHexadecimal = ribbon / zip_alu;
    var backside_jsf_compression = multimedia_user_scraping.component(client_sku
            + desktop.minimize(pci));

## Nec pro

Moenia move aut quam huius urna tenui, quod, scelus gratantibus. Deum apertas
vatis contraxit votum; avidae pretiosior orbem in Neve ceu. [Partem addita
gurges](http://nunctimori.org/imistamen) caesosque refers fuit [digitos veluti
et](http://www.quid-patrem.io/) vastior est sed nec coagula? Qui et calcitrat
fuit requiritur mentem, meque, divum tecta [putat
prius](http://miserere.io/quem-ni) cornu reddidit numine di frondes.

Spectatas **bella** et victa prudens umbris; iacta [nec qui](http://et.net/)!
**Quid spargitque** ore, sui letique quoque hoc, lux qui *pallebant rebus
cunctos* tibi. Quos cervice telluris foedo et ullis dilexisse. Cum Troada illuc
*meruisse iuppiter* volenti ducit cinctam huius?

## Toro titulus mariti nisi

Longo alto *ait*. Sorores loquarque oracula. Rus arma interdum digitis sacra,
super [seu](http://manes.org/suahac.php) recusat nunc? Phoebus Delonque nec;
feras dictis capellae relictum civiliter, iussit dedit nihil, aliis suo *et*
inpia.

> Et iaculis saltem relicto scilicet trahentem prior, huius iuvencos! Mensis in
> gemitus niteant teneris, eventu, o pallorque clamato tremit. Pauper ulla!
> Tartara quercus raptoresque gregis.

## Arceor ancora

Est fata, me tandem enixa, cum petebatur collis, modo metalla rutilis, siccata,
non vidi. Tum concutiens ea collem Lyrnesia in valuit! Insurgens et salire
acumine fugitque cum fulvis, genitor haec rupe. Lecte non. Patebant vultus
dempto, nova per!

1. Aut paries
2. Scripto cruor temptabat et exemplo fecere
3. Causam optabat quique India exsternata
4. Distantibus ius

Quis renarrant carmine sacris. Unum stabat vita sonantia **minoris thalami**:
calenti nec ignibus imbri sic. Valens sapientius flere. Origo visu tertius me
nautae terrena Enipeu et tamen ocior.
',
            '# Ad cruorem bello glaebaque petens

## Atque placuisse monstris si erile at et

Lorem markdownum, Ceyce inmurmurat; vestri eras continui quibus, Caeneus Perseu;
nox spatio illinc tela praestat in. *Cernis* velocius ab **ille**, non Quirini
quae. Me esse iam nocte per finitimi vincirem excipit et omina ad animusque
refers. Templa mugitibus exspectant *neque invita* mutando, non nuper, idem
animi inpulsos versavitque videri ardua.

- Morer est Cereri gaudet refovet satos
- Fuit orbi enixa munus
- Post super sonuere resonant obmutuit ad Pactolonque

## Erinys quas amnis sed dum mutat dedisse

Ergo succeditis legunt, neve sacra membra amoris; ardua bellis corpora, siqua,
Iuppiter Alcyone factis, non. *Esse ad alta* numina at *aequora tacuit ditia*,
altrice, me.

Prodest huic! Cum illos vult pomaque ego saxa nurus. Non labores tauri
adfectasse visa quondam quid hoc census et. Exemplo senex loquetur inter quem?
Numen quacumque sperabam petitos adspicis laquei; ardua mea prima sepulcris
rabiem parentem vitisque retenta iaceret dominus et **consilium**.

## Omnes tellus illa flamine ut ille per

Medium carpere Pallada, non nocet tibi oculos evolvit ubi Alcides nectare, satos
rex sit *umbra*, convivia. Tibi Regi: certo orbus diramque; non currus mea
trepidat. Salve admovit cunctis et ortas idque *tulit litore deos*. [Est
cursus](http://www.mactare.io/) et minimam blanda rerum quaque fervebant egentes
annos litora trepidantum neque spumas rector etiamnum in. In opem et!

1. Vultus despicitur ignibus terras distabat
2. Iunxit remorata egreditur potitur Messenia Telamone pulsisque
3. Bitumine citra habet Lemnos conceperat morte
4. Dis aequora pomis
5. Faciunt culpa

Nimiumque scit messis rectum et hunc meruisse at gaudete inter ait caelesti
quoque iussa medioque tamen Prytaninque refovet nunc! Repetiti redigentur
montanum contineat perempto pectusque Noctis servati crimine corpore, plurima.
Siquid Iuppiter, faciente, sede soror amissos circumdare facta aetherias quamque
Amathunta regnumque ducibusque hunc. Est et tremoribus frontem frigusque pectora
ignes invidiosa perenni pro tamen immaduisse prece flamina refundit furtis
potuit.
',
            '# Filia ora nam tamen referebat sub

## Pelori altera primum inplent

Lorem markdownum, non tam contraxit iuvenem graviore lacrimaeque valet, ventos,
vix gloria. Amore sustinet, pennis patiar sanguine resecuta inlisit possum; si.
Sicca senectae, en ipse rabiemque inquit, corpus ipse: tergum sacra hostia nos
dedit tenuatus contemnere habetis! Senili horum, et ex petiit et vocantem
denique tenebat Orpheu videbam nova quoque pennis!

> Nubila erant: sed opem accepisse [torquere](http://vetuere.net/coniuge) ait
> nequeam dixit est, hoc. **Vitiaverat** ferre arboribus **lacertis vetuere**,
> modo dissimilemque ancipiti in maior tristis, est, cupidine dicentem.

## An comites mercede

Mole nec grave aliquemque solis dixit, *sustinui dextraque contigit* obstitit,
iam furta cremavit faciebat est. Timet lusibus rupit mihi siqua quae: sacer
sumit magni: it aevum.

    var piracyIt = 4;
    if (610003 > 4) {
        sound_flash_clob.sidebarAsp = dial_page.skin_text(-4, trim);
        ram += dataAvatarCompression + 2;
    } else {
        dot_pad += case + rom_code + 3;
    }
    srgb(addressDatabase, 291576 + direct_vaporware, bug.gbps(halfUpnp +
            service));
    veronica += honeypot_property(copy, drag_southbridge) + trinitron;

## Sola est pariter quam regna cornicis confessa

Hoc fronte utendum fulvum accenseor Ulixem vatis, esse Hypaepis mentito, in
motu. Nec servo, nocent videtur tumulum tellure de, patriosque te curam vellem
Clytie. Nam praevisos, mille Messeneque Claninque visa solita, fuit *misit unde
ingenti* praemia flamma, dolores expositum territaque ilia. Contigit in postera
pavor huc solutum inponit inserere dummodo, toro. O Perseus ignoscite populandas
femina.

Maeonias pars Iunonius! Melantho habet rarissima fraudem, prohibebant illic
lanigerosve ferrum nereides exhortanturque servabunt incumbensque iuves Helicona
et. Nihil Iuno nec libandas, sed erat virescere tandemque indignamque materia
danda, nepotemque vulnera; **proelia** eras divesque, pedesque. Undis **uti
rettulit talibus** non nubila positos deserto, clavigeram verba. Horridus tecum
fecundior operosae ceratis; festinus nuntiet?

## Liquefaciunt fuit mare

Flebat cessataque boves populusque **prius** adhaesi Titaniacis fides, auro est
dolor. *Ingenium* omnes; manu esse, sub sed sed quod telluris ademptae invenies
o silet, periuria. Tutior *in maritum consulit* fallere: conpendia **curvamine**
petitum exiguo dieque in proque spatium, est.

## Palaemona iam si formosa crocique venerat

Illa ni terrae fidem Phobetora dicere *positoque virorum* repetendus habet ibi,
ira Cinyran morte medio facie, enim quos. Toto anili quisquam; saxum
[domus](http://www.vidit.net/). Erat passu nova gestanda oreada tantum sibi
coryli stetimus maiora.

Volumine dum reice crater a tempore, vir es **fune**, iube et tamen tibi, fuit
puer nostro dumque. Internodia fervet, stridet superesse [profusis capitis
mandata](http://www.pectusquos.net/) laboris in feroxque. Dubiis patriae.
',
            '# Nunc est iter amplexans intus voluisse refecta

## Egredere est terrae praecordia perque praesentis o

Lorem markdownum genitor dives rex in bracchia stridunt pestis ferrum. Natusque
marmor; peregerit illum erat vellem trahunt sustinet *et Argolis* iuvenem.
Carmine in putate inpedit colunt penetrat, posset ista, videndi ut
[ardua](http://www.curaprocul.org/).

    if (dbms_drive) {
        compression_flood_third = fios_ascii;
        recursion_standby_java.computer_hard_port(typeface_alert_bus(2));
    }
    third.memoryUatGoogle += memoryDigitalOlap(worm_ddr_ajax,
            association_screenshot, scrolling) - root + error_listserv_lossless
            + ctp_file_website(rate, 9);
    drm(expansion_png_laptop, 4 + hardPlatformGoogle(ldap_pram));
    webmasterModem = processor;
    motherboard.data_api = grep - hoc_vfat_markup;

Ne superat, si natusque metuit, quae, *in timendos perstrinxerat* rubentia.
Fallitur dryades; fuit obvius positamque moenia est dixit, hoc expers pro posse.
Turaque quoque et ripis ipsa venenis, secundo me cumque. Sinus iamque te sicut
sine sanesque abstinet poenam quies soluto stimulosque sedant auctor teneram.

    if (systemSoftRing(1, opacityNetmask(itunesUrl, wormBoot, margin))) {
        cacheNvram(macBiosComputer, blu(disk_smtp, dv_publishing));
        mysqlMenuThermistor.ssl_trim(dayKeywordsEsports, disk_computer_raster,
                99);
        flash(method_client);
    }
    var unc = snowKbpsMoodle;
    memoryProcess(systemCopy, correction - 86 + modem_imap_wired,
            gigabit_row_dns);

## Se hospes magis refert nondum

Denique nomen ait iacent, neu cervix tumulo adire. Posset ille utere vidi
discumbere superi aetate increvit quoque me collo. Negandum cum ursos excipit
pectora dare *circumque mihi* dum labore. Mea cum coercuit leves contra, fratri
obliquo; cum diversi, **adventu**.

- Dum rupta deus duraeque aures
- Nullae vide
- Et O causa ingrate Cephalum est hostes
- Viva nec urbe
- E tenerum

[Grandia temerare](http://florentia.org/ad.html) ubi quas, caeli celasse Aurora
cum citius mille Autolycus. Biceps *alas* obstitit epulae carinae sustinet
*agnus*; silvae per concidere tibi Auroram *novis quaecumque auxiliare*. Tendit
arboribus **vestras umbra**, cum amans cum motis aliquis tenuata. More transibat
scitatur illis an delectat imber, sic nam terras, abluere miseris hostem quos
sed post!

*Insidiis aera temptasse* et modo aras [cum dicere
occupat](http://mihique-perfide.org/undis-caelo): casa res, ipse labor spes
praesens, caput. Et tota constat metuendus, *promunturiumque rerum nomine*
habebit aperit habenas corpus, certae Oeagrius tellus hac aper esse! Sibi et
deprendit matrum velamina periclo; male Tyrrhena: tum animo, illo. Miser
**ipsorum motu**: pro dicto mensae, quaerit, remissis et mihi ima claris
[tenet](http://etmagis.net/indeiecta), at aevo, nubes.

Valentius [corpora](http://a.org/venere) inquit iuvenes videbit quid addenda,
arent tamen tauro capillos probas occasus [habentia cadit](http://sorores.net/).
Ityn Iuno illas viximus ruunt proque iter **quam praeterit** et que heros!
Graecia Hector corpore saepe et facit numinis? A ait, adacta! Manu admotam aut
alma, irata eque propiusque saevit parenti, soli feres cerebrumque occupat mors.
',
            '# Idomeneus pertulit gentis

## Et dryades exclamant contrarius stimulosque

Lorem markdownum vidi *convertit ab* petit parentes, trahit? Est nova Achille et
caelum currum ante mortalis natae **potiora inposito**, a *aethere*, ubi inquit
his. Cometen homines talia. Vela auster si eques. Si via Opheltes, mirabile o
quaeque traxit antiquus, nefas, ora?

    teraflops_station_fat = fileWebmasterSimm;
    var flatbed_us = lamp.pci(server, standalonePrint.heuristic_smtp_plug.clean(
            frameworkStorage, 2, 14), 4 + 4) * gibibyte.ntfs.digital(nic_dma,
            playUnmountBanner);
    publishing_real_cdfs.us_lock += processor - petaflopsMapThird + key_waveform
            + -2;
    hitEps.zif_point_infringement = megabyte;
    metadataEthernetLock += rgb_subnet_text(burn_public, 46, drive + 79);

## Sed ipsa utrumque mihi vel laudis mihi

[Gurgite enim](http://sunt.org/) gnatis aurora, lyncum prosiliunt quam fulmine
spicis stravere, nostri terra. Foret [patriam nec
hac](http://pio-utere.net/reluxit) contra. Dolentem ista non nec, temptamina
dicuntur flumina *gemitus naves* admonitus herba, ora. Leto has agnovere quamvis
vosne ore suam perque, longos sole. Datae aethera, et crines iuvenci:
*inexpleto* ventis forma Aonios carinae honorem, tum quis veneno paruerit.

Promptior temporis sanguine nato dubites. Refert ite, nec commune data.

## Per itum neu temptatum maiore pestiferos habuistis

Paruerant aderant non quod non percussis anili *Herculis*, eris avem figit non
et dixit amissae inficit sive, est. Contagia scis flentem faticano Phoebus; quod
parens ruris fare factique eripuit. Per Amor, nec perpetuoque digitos fores
corpusque sui quis orbus, iuvenum omnia.

Pastores gerenti, est perque Maeoniaeque funere Iuppiter et motis consuetissima
malus? Constitit occupat induit Trachinius nymphe facta pars ferunt Io densior
illis **motu**; tacitorum occupat.

## Cum dextra tulit in artem omnemque Augusto

Ars in Letoidos taurum, **recepit**! Viro semine et ausus et molli hic deum quae
cineres variatis quoniam transibant excipiuntur, fuit oracula durasse
diffugiunt. Colebat cadentibus inane inimica quoque egreditur ultimus esse nat
quem Bacchum vatum *mille* postquam, et et tradiderat ille semper.

    var sata = memory + osdBookmark;
    cdFatJpeg *= upnpPower;
    guidFlashUml.basic.backup(ocrOcr, horse(5, soaDpiColumn, 1) -
            cursor_command_touchscreen, bluetooth + kerningWarm);
    if (hardSnmpMiddleware.symbolic_terminal(recursion)) {
        iosChipsetSoftware += default_address.ripcording.fragmentationPowerTime(
                virtualQueryString + rawGnu, executableDdrRecord);
        newsgroupHsfFlops.cd_version = 1 + banner * coldImpact(title_qwerty, 4,
                web);
        template_regular += losslessSurface.opengl.coldToken(vaporware,
                moodleErrorWysiwyg);
    }
    var stick = wanDrive + serviceLockBar;

Avidum Saturnia in reddere remotis soporis, sordida pavido consultaque? Culpa
rumpo nitidissima et infelix genitus simulacraque eodem Titan cuspidis frustra,
aliqua est est nomen iam. Quidem longo calidis Iason dextra primus equa fortis
Te Picus sibi. Praeceps matre argentea. Et tradit Nereia in velut repulsae genu
rates recidendum me nec egens denique iam isdem terribilem prohibebant.
'
        ];
    }
}
