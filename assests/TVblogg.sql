-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 16 dec 2014 kl 11:25
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `TVblogg`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `blogposts`
--

CREATE TABLE IF NOT EXISTS `blogposts` (
`post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_text` text NOT NULL,
  `published_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumpning av Data i tabell `blogposts`
--

INSERT INTO `blogposts` (`post_id`, `user_id`, `post_title`, `post_text`, `published_time`, `category_id`, `published`) VALUES
(3, 3, 'Sci-fi 3', 'Lorem ipsum edit post																						', '2014-12-01 13:33:40', 3, 1),
(7, 1, 'hej', 'new post category 3 \r\n																				', '2014-11-28 17:46:25', 3, 1),
(8, 1, 'new', 'new post category \r\n																				', '2014-11-24 14:19:36', 2, 0),
(9, 1, 'hej', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam, ut sint illa vendibiliora, haec uberiora certe sunt. Duo Reges: constructio interrete. Tu quidem reddes; An me, inquis, tam amentem putas, ut apud imperitos isto modo loquar? Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Negare non possum. </p>\r\n\r\n<p>Apparet statim, quae sint officia, quae actiones. Summus dolor plures dies manere non potest? Igitur neque stultorum quisquam beatus neque sapientium non beatus. Verba tu fingas et ea dicas, quae non sentias? Itaque his sapiens semper vacabit. Ex ea difficultate illae fallaciloquae, ut ait Accius, malitiae natae sunt. </p>\r\n\r\n<p>Tu vero, inquam, ducas licet, si sequetur; Si quidem, inquit, tollerem, sed relinquo. Ratio quidem vestra sic cogit. Sed quid attinet de rebus tam apertis plura requirere? Ut id aliis narrare gestiant? Vitiosum est enim in dividendo partem in genere numerare. Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Quasi vero, inquit, perpetua oratio rhetorum solum, non etiam philosophorum sit. </p>\r\n\r\n<p>Quodsi vultum tibi, si incessum fingeres, quo gravior viderere, non esses tui similis; Quid, de quo nulla dissensio est? Sic consequentibus vestris sublatis prima tolluntur. Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; Nescio quo modo praetervolavit oratio. Ex ea difficultate illae fallaciloquae, ut ait Accius, malitiae natae sunt. </p>\r\n\r\n<p>Quid de Platone aut de Democrito loquar? Solum praeterea formosum, solum liberum, solum civem, stultost; Igitur neque stultorum quisquam beatus neque sapientium non beatus. Atqui eorum nihil est eius generis, ut sit in fine atque extrerno bonorum. Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint. </p>\r\n\r\n\r\n												', '2014-12-12 10:55:49', 1, 1),
(10, 1, 'Hello', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quamquam id quidem, infinitum est in hac urbe; Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. Idem iste, inquam, de voluptate quid sentit? Stuprata per vim Lucretia a regis filio testata civis se ipsa interemit. Quid censes in Latino fore? Qua ex cognitione facilior facta est investigatio rerum occultissimarum. Ex ea difficultate illae fallaciloquae, ut ait Accius, malitiae natae sunt. </p>\r\n\r\n<p>Immo alio genere; Ille vero, si insipiens-quo certe, quoniam tyrannus -, numquam beatus; Quae similitudo in genere etiam humano apparet. Cur igitur, cum de re conveniat, non malumus usitate loqui? Ait enim se, si uratur, Quam hoc suave! dicturum. </p>\r\n\r\n<p>Duo Reges: constructio interrete. Philosophi autem in suis lectulis plerumque moriuntur. Itaque mihi non satis videmini considerare quod iter sit naturae quaeque progressio. Ut aliquid scire se gaudeant? Id enim volumus, id contendimus, ut officii fructus sit ipsum officium. Sed ut iis bonis erigimur, quae expectamus, sic laetamur iis, quae recordamur. Huius, Lyco, oratione locuples, rebus ipsis ielunior. </p>\r\n\r\n<p>Torquatus, is qui consul cum Cn. An ea, quae per vinitorem antea consequebatur, per se ipsa curabit? Sed eum qui audiebant, quoad poterant, defendebant sententiam suam. Haec igitur Epicuri non probo, inquam. Cur, nisi quod turpis oratio est? Ita enim vivunt quidam, ut eorum vita refellatur oratio. Quae quo sunt excelsiores, eo dant clariora indicia naturae. Ne in odium veniam, si amicum destitero tueri. </p>\r\n\r\n<p>At certe gravius. Non quam nostram quidem, inquit Pomponius iocans; At quicum ioca seria, ut dicitur, quicum arcana, quicum occulta omnia? Quamquam te quidem video minime esse deterritum. Nobis aliter videtur, recte secusne, postea; Vide, quantum, inquam, fallare, Torquate. Quod cum dixissent, ille contra. </p>\r\n\r\n																							', '2014-12-14 18:25:58', 3, 1),
(11, 1, 'jajaa', 'post category id\r\n				', '2014-11-24 14:25:54', 4, 0),
(12, 1, 'An old goody!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque a suscipit turpis, eu tempor nunc. In viverra ipsum quis odio consectetur dapibus. Nullam quis erat vel augue maximus mollis. Sed ac posuere tortor. Cras interdum felis eu odio tempor varius. Pellentesque mauris erat, tempus et ex ac, sollicitudin ornare turpis. Vivamus tincidunt arcu semper convallis ornare. Cras at dui congue, dignissim erat sed, feugiat ligula. Maecenas facilisis lectus vel tellus facilisis aliquet. Nulla eget pharetra neque, in imperdiet elit. \r\n																				', '2014-12-04 15:58:47', 1, 1),
(13, 1, 'Wohoo!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam venenatis lectus nec viverra suscipit. Fusce at varius velit, sodales convallis ex. Nulla sed mollis dolor. Morbi vitae iaculis justo. Suspendisse tincidunt est mauris. Vivamus diam nisi, posuere eu imperdiet eget, sollicitudin varius arcu. Curabitur consectetur placerat vulputate. Suspendisse purus nibh, lobortis vel nisl sed, tempor luctus ligula. Vivamus et posuere purus. Pellentesque euismod ac ipsum vitae vulputate. Maecenas dui velit, tristique sed pretium eu, pellentesque nec tellus.\r\n\r\nNam rutrum mi vulputate mauris consectetur iaculis. Curabitur id varius tortor, auctor varius arcu. Maecenas interdum ipsum eget diam pulvinar, at convallis neque fringilla. Ut eu libero sed risus egestas convallis. Sed elementum lorem in justo accumsan sodales. Donec sit amet consectetur risus, at ultrices velit. Mauris pretium sit amet nunc sed pretium. Integer vestibulum rutrum arcu tincidunt tempor. Integer mollis, neque in lacinia placerat, orci quam fermentum neque, in congue velit sapien vitae tortor																								', '2014-12-04 15:59:44', 3, 1),
(14, 3, 'lets see', 'what?! \r\n												', '2014-12-01 13:33:27', 2, 1),
(15, 1, 'Tungt att se', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc iaculis commodo sem, nec fringilla lorem consequat ac. Quisque sed posuere velit, id viverra dolor. Maecenas aliquam, velit vel efficitur pellentesque, lectus lorem condimentum arcu, in vestibulum lectus massa id erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam erat volutpat. Nulla suscipit odio sem, eget congue lacus vehicula ac. Nunc auctor est erat, sit amet dignissim lectus maximus ut. Phasellus sed risus eget tellus fermentum porta. Aliquam rhoncus accumsan egestas. Morbi ut elit eget magna consectetur elementum. Sed tincidunt, ante ac congue blandit, tellus elit ultricies quam, eget faucibus ipsum lorem in justo.\r\n\r\nProin scelerisque diam quis ante fringilla, sit amet imperdiet velit sagittis. Ut laoreet nunc id dui sollicitudin consequat. Integer id nunc mi. Donec et convallis est. Curabitur at finibus arcu. Praesent nibh felis, convallis vitae finibus posuere, dictum in ipsum. Vivamus at sem iaculis, tincidunt odio in, ullamcorper ligula. Phasellus bibendum suscipit urna, et tempus dui bibendum et. Aenean porta arcu ut cursus eleifend. Vestibulum ac leo nec lacus tempus auctor.\r\n\r\nPhasellus vel molestie nisi. Proin placerat urna in sapien fringilla, quis imperdiet ligula pulvinar. Cras iaculis volutpat sem, a imperdiet metus feugiat a. Duis purus tortor, commodo a luctus pretium, venenatis ut magna. Maecenas at felis nec mi molestie accumsan non vel ex. Mauris blandit, ante vel elementum maximus, diam nisl sagittis metus, in lacinia neque arcu a lacus. In gravida viverra sapien, vel varius libero. Ut in aliquam nisi. Sed vehicula, ex nec egestas ullamcorper, ipsum lorem tristique enim, eget rhoncus ipsum orci a odio. Nunc in enim nunc. Quisque facilisis interdum massa et vulputate.\r\n																					', '2014-12-04 16:01:27', 2, 1),
(16, 1, 'skapar nytt', 'provar med inlÃ¤gg nr 9 \r\n													', '2014-12-02 15:03:39', 4, 1),
(17, 1, 'Svenska', 'Provar skriva åäö \r\n													', '2014-11-28 15:49:11', 4, 1),
(22, 1, 'Så skrattretande!', '<p>Etiam eu ex lectus. Aliquam orci magna, aliquet sed viverra sit amet, faucibus ut mi. Proin a massa neque. Nulla mollis, justo sit amet ultrices interdum, dolor nulla ornare magna, et tristique massa lectus vitae nunc. Duis eu erat id orci luctus ultricies sed vel ex. Sed tincidunt vel elit ut convallis. Ut suscipit mollis lobortis. Nulla sed leo efficitur, mattis enim et, finibus erat.</p>\r\n\r\n<p>Aliquam ut diam lobortis, bibendum urna ac, feugiat magna. In mollis, libero ut suscipit consectetur, dolor nunc imperdiet odio, at gravida velit enim at diam. Phasellus lobortis lacus eu arcu accumsan, id efficitur leo fringilla. Nam et laoreet risus. Nulla sodales auctor nisl, a placerat felis dapibus et. In dignissim vestibulum nisl, vel hendrerit felis ornare vel. Cras laoreet diam vel tortor elementum, non consequat sem tincidunt. Morbi euismod erat vel magna ullamcorper maximus. Nunc eu odio eu felis tempus hendrerit id sed nibh. Nullam enim sem, congue id lectus nec, tincidunt sagittis massa. Ut condimentum blandit ipsum, nec porta enim posuere non. Proin iaculis lacus nec magna mollis, id vehicula odio luctus. Praesent dolor felis, luctus vel eros a, suscipit mollis ante. Sed tristique diam felis.</p>\r\n\r\n<p>Ut in posuere nisi. Fusce non ullamcorper turpis. Praesent condimentum tincidunt urna quis faucibus. Praesent placerat, magna et volutpat porta, tellus massa pharetra tellus, sed commodo quam nulla eu nunc. Fusce aliquam ac nibh in condimentum. Proin suscipit sem at enim lobortis, maximus dapibus libero hendrerit. Donec vehicula nisl id ex tempus, sit amet efficitur ex venenatis. Vestibulum sodales nisi augue.</p>\r\n\r\n<p>Donec dolor lacus, posuere viverra nunc eu, semper eleifend ante. Quisque blandit accumsan scelerisque. Ut auctor mattis enim, vitae imperdiet ex condimentum vitae. Sed viverra sagittis diam, non tincidunt dui mattis id. Morbi finibus massa nec justo consectetur ornare a sit amet libero. Proin commodo pellentesque suscipit. Donec ipsum magna, convallis eu aliquam et, viverra ut nulla. Nulla vitae finibus tellus. Maecenas accumsan libero ac ex rutrum, in interdum urna vulputate.</p>																		', '2014-12-04 16:03:49', 1, 1),
(23, 2, 'Stor rubrik', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum audissem Antiochum, Brute, ut solebam, cum M. Expectoque quid ad id, quod quaerebam, respondeas. Tu quidem reddes; Sed quid ages tandem, si utilitas ab amicitia, ut fit saepe, defecerit? Duo Reges: constructio interrete. Tertium autem omnibus aut maximis rebus iis, quae secundum naturam sint, fruentem vivere. Sed haec nihil sane ad rem; Quis istud possit, inquit, negare? Sed erat aequius Triarium aliquid de dissensione nostra iudicare. Cur igitur, inquam, res tam dissimiles eodem nomine appellas? </p>\r\n\r\n<p>Quamquam tu hanc copiosiorem etiam soles dicere. Tum mihi Piso: Quid ergo? Ut in voluptate sit, qui epuletur, in dolore, qui torqueatur. Invidiosum nomen est, infame, suspectum. Hic quoque suus est de summoque bono dissentiens dici vere Peripateticus non potest. Quorum sine causa fieri nihil putandum est. Ratio enim nostra consentit, pugnat oratio. Nam Pyrrho, Aristo, Erillus iam diu abiecti. Nobis aliter videtur, recte secusne, postea; Conferam tecum, quam cuique verso rem subicias; Sed quid sentiat, non videtis. </p>\r\n\r\n<p>Sic exclusis sententiis reliquorum cum praeterea nulla esse possit, haec antiquorum valeat necesse est. Idem iste, inquam, de voluptate quid sentit? Non pugnem cum homine, cur tantum habeat in natura boni; Ita relinquet duas, de quibus etiam atque etiam consideret. Quis animo aequo videt eum, quem inpure ac flagitiose putet vivere? Quoniam, si dis placet, ab Epicuro loqui discimus. Ita ne hoc quidem modo paria peccata sunt. Praeclare hoc quidem. </p>\r\n\r\n<p>Paria sunt igitur. Facete M. Universa enim illorum ratione cum tota vestra confligendum puto. </p>\r\n\r\n<p>Primum quid tu dicis breve? Honesta oratio, Socratica, Platonis etiam. Sine ea igitur iucunde negat posse se vivere? Bonum negas esse divitias, praeposìtum esse dicis? Teneo, inquit, finem illi videri nihil dolere. In quibus doctissimi illi veteres inesse quiddam caeleste et divinum putaverunt. Qui ita affectus, beatum esse numquam probabis; An eum discere ea mavis, quae cum plane perdidiceriti nihil sciat? </p>\r\n\r\n \r\n							', '2014-12-14 18:21:14', 4, 1),
(24, 2, 'Bla bla', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Verum esto: verbum ipsum voluptatis non habet dignitatem, nec nos fortasse intellegimus. Pauca mutat vel plura sane; Faceres tu quidem, Torquate, haec omnia; Itaque in rebus minime obscuris non multus est apud eos disserendi labor. </p>\r\n\r\n<p>Easdemne res? Amicitiam autem adhibendam esse censent, quia sit ex eo genere, quae prosunt. Quamquam tu hanc copiosiorem etiam soles dicere. Praeclare enim Plato: Beatum, cui etiam in senectute contigerit, ut sapientiam verasque opiniones assequi possit. </p>\r\n\r\n<p>Et quidem illud ipsum non nimium probo et tantum patior, philosophum loqui de cupiditatibus finiendis. Faceres tu quidem, Torquate, haec omnia; Quas enim kakaw Graeci appellant, vitia malo quam malitias nominare. Huius, Lyco, oratione locuples, rebus ipsis ielunior. Huius ego nunc auctoritatem sequens idem faciam. Sed venio ad inconstantiae crimen, ne saepius dicas me aberrare; </p>\r\n\r\n<p>Non enim iam stirpis bonum quaeret, sed animalis. Conferam tecum, quam cuique verso rem subicias; Et ille ridens: Video, inquit, quid agas; </p>\r\n\r\n<p>Duo Reges: constructio interrete. Semovenda est igitur voluptas, non solum ut recta sequamini, sed etiam ut loqui deceat frugaliter. Utinam quidem dicerent alium alio beatiorem! Iam ruinas videres. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat. Tantum dico, magis fuisse vestrum agere Epicuri diem natalem, quam illius testamento cavere ut ageretur. Cur, nisi quod turpis oratio est? </p>\r\n', '2014-12-14 18:34:17', 1, 1),
(25, 3, 'Super', '									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Virtutibus igitur rectissime mihi videris et ad consuetudinem nostrae orationis vitia posuisse contraria. Vide, quantum, inquam, fallare, Torquate. Earum etiam rerum, quas terra gignit, educatio quaedam et perfectio est non dissimilis animantium. Tamen a proposito, inquam, aberramus. Duo Reges: constructio interrete. </p>\r\n\r\n<p>Quid, de quo nulla dissensio est? Sin laboramus, quis est, qui alienae modum statuat industriae? Atqui reperies, inquit, in hoc quidem pertinacem; Graece donan, Latine voluptatem vocant. </p>\r\n\r\n<p>Ergo et avarus erit, sed finite, et adulter, verum habebit modum, et luxuriosus eodem modo. Quorum altera prosunt, nocent altera. Quae cum praeponunt, ut sit aliqua rerum selectio, naturam videntur sequi; Quid censes in Latino fore? Quid ergo aliud intellegetur nisi uti ne quae pars naturae neglegatur? Nam illud vehementer repugnat, eundem beatum esse et multis malis oppressum. Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint. Videmusne ut pueri ne verberibus quidem a contemplandis rebus perquirendisque deterreantur? Quod autem principium officii quaerunt, melius quam Pyrrho; </p>\r\n\r\n<p>Obsecro, inquit, Torquate, haec dicit Epicurus? Consequentia exquirere, quoad sit id, quod volumus, effectum. Sed nimis multa. Partim cursu et peragratione laetantur, congregatione aliae coetum quodam modo civitatis imitantur; Non autem hoc: igitur ne illud quidem. Ipse Epicurus fortasse redderet, ut <i>[redacted]</i>tus Peducaeus, <i>[redacted]</i>. </p>\r\n\r\n<p>Mihi enim satis est, ipsis non satis. Illud non continuo, ut aeque incontentae. Age, inquies, ista parva sunt. Isto modo ne improbos quidem, si essent boni viri. Ita multa dicunt, quae vix intellegam. </p>\r\n\r\n \r\n															', '2014-12-14 18:29:23', 2, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Komedi'),
(2, 'Drama'),
(3, 'Science Fiction'),
(4, 'Deckare');

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_name` varchar(30) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_website` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumpning av Data i tabell `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_text`, `comment_name`, `comment_email`, `comment_website`, `post_id`, `comment_time`) VALUES
(1, 'Testing comments					', 'Lena', 'lena@gmail.com', 'www.lena.com', 13, '2014-11-26 09:44:40'),
(3, 'Testing comments					', 'Lena', 'lena@gmail.com', 'www.lena.com', 13, '2014-11-26 10:08:33'),
(4, 'Nice!					', 'Anna', 'anna@gmail.com', 'www.anna.se', 14, '2014-11-26 10:09:31'),
(6, 'blablabla					', 'Kalle', 'kalle@anka.se', 'www.kalleanka.se', 11, '2014-11-26 15:35:37'),
(8, 'Testar igen					', 'Anna', 'anna@gmail.com', 'www.anna.se', 10, '2014-11-26 15:40:44'),
(9, 'Testing comments					', 'Lena', 'lena@gmail.com', 'www.lena.com', 9, '2014-11-26 15:43:22'),
(10, 'lkaslkas					', 'Kalle', 'kalle@anka.se', 'www.kalleanka.se', 14, '2014-11-26 15:47:53'),
(11, 'lkaslkas					', 'Kalle', 'kalle@anka.se', 'www.kalleanka.se', 14, '2014-11-26 15:52:09'),
(13, 'hehehee					', 'Kalle', 'kalle@anka.se', 'www.kalleanka.se', 8, '2014-11-26 16:32:58'),
(14, 'hej					', 'Kalle', 'kalle@anka.se', 'www.kalleanka.se', 14, '2014-11-27 08:21:00'),
(15, 'Tufft!					', 'Kalle', 'kalle@anka.se', 'www.kalleanka.se', 7, '2014-11-27 08:33:14'),
(16, 'Ohhhh					', 'Lena', 'lena@gmail.com', 'www.lena.com', 3, '2014-11-27 12:41:24'),
(17, 'kakakaka					', 'Kalle', 'kalle@anka.se', 'www.kalleanka.se', 10, '2014-11-27 12:42:09'),
(18, 'tjaba					', 'diana', 'diana@gamil.com', 'jajaja', 3, '2014-11-27 12:43:26'),
(19, 'hahaahahah					', 'Lena', 'lena@gmail.com', 'www.lena.com', 8, '2014-11-27 13:43:42'),
(20, 'provar igen kommentar 14					', 'Anna', 'anna@gmail.com', 'www.anna.se', 7, '2014-11-27 14:00:14'),
(21, 'hahaha					', 'Anna', 'kaka', 'www.anna.se', 22, '2014-12-02 09:36:00'),
(22, 'hahaha					', 'Maria', 'lala', 'lala', 22, '2014-12-02 09:37:05'),
(23, 'Hej! Vilken bra text!					', 'Anna', 'anna@gmail.com', 'www.anna.se', 3, '2014-12-12 13:24:30'),
(24, 'Easdemne res? Amicitiam autem adhibendam esse censent, quia sit ex eo genere, quae prosunt. Quamquam tu hanc copiosiorem etiam soles dicere. Praeclare enim Plato: Beatum, cui etiam in senectute contigerit, ut sapientiam verasque opiniones assequi possit.					', 'Lena', 'lena@gmail.com', 'www.lena.com', 25, '2014-12-14 18:51:28'),
(25, 'Utinam quidem dicerent alium alio beatiorem! Iam ruinas videres. Varietates autem iniurasque fortunae facile veteres philosophorum praeceptis instituta vita superabat.					', 'Maria', 'maria@gmail.com', 'www.maria.se', 25, '2014-12-14 18:52:33'),
(26, 'Mihi vero, inquit, placet agi subtilius et, ut ipse dixisti, pressius. Animum autem reliquis rebus ita perfecit, ut corpus; Beatus sibi videtur esse moriens. Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant? Virtutibus igitur rectissime mihi videris et ad consuetudinem nostrae orationis vitia posuisse contraria. Minime vero, inquit ille, consentit.					', 'Kalle', 'kalle@anka.se', 'www.kalleanka.se', 23, '2014-12-14 18:53:13');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `website`) VALUES
(1, 'Diana', 'Castro', 'diacas84@gmail.com', 'hej123', 'www.dianacastro.se'),
(2, 'Erik', 'Elmehed', 'erik.elmehed@gmail.com', 'erik123', 'www.google.se'),
(3, 'Lisa', 'Hjarpe', 'lisahjarpe@gmail.com', 'lisafisa', 'www.fisen.se'),
(4, 'super', 'admin', 'super@admin.com', 'superduper', 'www.super.se');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `blogposts`
--
ALTER TABLE `blogposts`
 ADD PRIMARY KEY (`post_id`);

--
-- Index för tabell `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category_id`);

--
-- Index för tabell `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `blogposts`
--
ALTER TABLE `blogposts`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT för tabell `categories`
--
ALTER TABLE `categories`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT för tabell `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
