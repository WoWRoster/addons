<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/

include '../../settings.php';


function insert_stat($itemrawlist)
{
	global $roster_conf, $addon_conf, $wowdb;

	foreach ($itemrawlist as $group => $itemraw)
	{
		$item = explode("\n", $itemraw);
		foreach ($item as $itemsplit)
		{
			$itemtmp = explode("\t", $itemsplit);
		
			$itemrowid = $itemtmp[0];
			$items = explode(" ", $itemtmp[1]);
			$itemcount = count($items);

			$insertitems = '';
			$insertvals = '';
			for($i=0;$i<$itemcount;$i++)
			{
				$insertitems .= ', `'.strtolower($items[$i+1]).'`';
				$itemval = $items[$i];
				$insertvals .= ", '".$itemval."'";
				$i++;
			}
			$insertsql = "INSERT INTO `roster171_dkpitemstats` (`suffix_id`, `text_id`".$insertitems.") VALUES ('".$itemrowid."', '".$group."'".$insertvals.")";
			$result = $wowdb->query( $insertsql ) or die_quietly($wowdb->error(),'roster_dkp',__FILE__,__LINE__, $insertsql );
			print($insertsql."<br>".$result."<br><br>");
		}
	}
}
/*
$itemlist[21] = '1445	+1 res_shadow
1446	+2 res_shadow
1447	+3 res_shadow
1448	+4 res_shadow
1449	+5 res_shadow
1450	+6 res_shadow
1451	+7 res_shadow
1452	+8 res_shadow
1453	+9 res_shadow
1454	+10 res_shadow
1455	+11 res_shadow
1456	+12 res_shadow
1457	+13 res_shadow
1458	+14 res_shadow
1459	+15 res_shadow
1460	+16 res_shadow
1461	+17 res_shadow
1462	+18 res_shadow
1463	+19 res_shadow
1464	+20 res_shadow
1465	+21 res_shadow
1466	+22 res_shadow
1467	+23 res_shadow
1468	+24 res_shadow
1469	+25 res_shadow
1470	+26 res_shadow
1471	+27 res_shadow
1472	+28 res_shadow
1473	+29 res_shadow
1474	+30 res_shadow
1475	+31 res_shadow
1476	+32 res_shadow
1477	+33 res_shadow
1478	+34 res_shadow
1479	+35 res_shadow
1480	+36 res_shadow
1481	+37 res_shadow
1482	+38 res_shadow
1483	+39 res_shadow
1484	+40 res_shadow
1485	+41 res_shadow
1486	+42 res_shadow
1487	+43 res_shadow
1488	+44 res_shadow
1489	+45 res_shadow
1490	+46 res_shadow';
$itemlist[22] = '1799	+1 arcane_spell_damage
1800	+3 arcane_spell_damage
1801	+4 arcane_spell_damage
1802	+6 arcane_spell_damage
1803	+7 arcane_spell_damage
1804	+9 arcane_spell_damage
1805	+10 arcane_spell_damage
1806	+11 arcane_spell_damage
1807	+13 arcane_spell_damage
1808	+14 arcane_spell_damage
1809	+16 arcane_spell_damage
1810	+17 arcane_spell_damage
1811	+19 arcane_spell_damage
1812	+20 arcane_spell_damage
1813	+21 arcane_spell_damage
1814	+23 arcane_spell_damage
1815	+24 arcane_spell_damage
1816	+26 arcane_spell_damage
1817	+27 arcane_spell_damage
1818	+29 arcane_spell_damage
1819	+30 arcane_spell_damage
1820	+31 arcane_spell_damage
1821	+33 arcane_spell_damage
1822	+34 arcane_spell_damage
1823	+36 arcane_spell_damage
1824	+37 arcane_spell_damage
1825	+39 arcane_spell_damage
1826	+40 arcane_spell_damage
1827	+41 arcane_spell_damage
1828	+43 arcane_spell_damage
1829	+44 arcane_spell_damage
1830	+46 arcane_spell_damage
1831	+47 arcane_spell_damage
1832	+49 arcane_spell_damage
1833	+50 arcane_spell_damage
1834	+51 arcane_spell_damage
1835	+53 arcane_spell_damage
1836	+54 arcane_spell_damage';
$itemlist[23] = '1875	+1 fire_spell_damage
1876	+3 fire_spell_damage
1877	+4 fire_spell_damage
1878	+6 fire_spell_damage
1879	+7 fire_spell_damage
1880	+9 fire_spell_damage
1881	+10 fire_spell_damage
1882	+11 fire_spell_damage
1883	+13 fire_spell_damage
1884	+14 fire_spell_damage
1885	+16 fire_spell_damage
1886	+17 fire_spell_damage
1887	+19 fire_spell_damage
1888	+20 fire_spell_damage
1889	+21 fire_spell_damage
1890	+23 fire_spell_damage
1891	+24 fire_spell_damage
1892	+26 fire_spell_damage
1893	+27 fire_spell_damage
1894	+29 fire_spell_damage
1895	+30 fire_spell_damage
1896	+31 fire_spell_damage
1897	+33 fire_spell_damage
1898	+34 fire_spell_damage
1899	+36 fire_spell_damage
1900	+37 fire_spell_damage
1901	+39 fire_spell_damage
1902	+40 fire_spell_damage
1903	+41 fire_spell_damage
1904	+43 fire_spell_damage
1905	+44 fire_spell_damage
1906	+46 fire_spell_damage
1907	+47 fire_spell_damage
1908	+49 fire_spell_damage
1909	+50 fire_spell_damage
1910	+51 fire_spell_damage
1911	+53 fire_spell_damage
1912	+54 fire_spell_damage';
$itemlist[24] = '1951	+1 frost_spell_damage
1952	+3 frost_spell_damage
1953	+4 frost_spell_damage
1954	+6 frost_spell_damage
1955	+7 frost_spell_damage
1956	+9 frost_spell_damage
1957	+10 frost_spell_damage
1958	+11 frost_spell_damage
1959	+13 frost_spell_damage
1960	+14 frost_spell_damage
1961	+16 frost_spell_damage
1962	+17 frost_spell_damage
1963	+19 frost_spell_damage
1964	+20 frost_spell_damage
1965	+21 frost_spell_damage
1966	+23 frost_spell_damage
1967	+24 frost_spell_damage
1968	+26 frost_spell_damage
1969	+27 frost_spell_damage
1970	+29 frost_spell_damage
1971	+30 frost_spell_damage
1972	+31 frost_spell_damage
1973	+33 frost_spell_damage
1974	+34 frost_spell_damage
1975	+36 frost_spell_damage
1976	+37 frost_spell_damage
1977	+39 frost_spell_damage
1978	+40 frost_spell_damage
1979	+41 frost_spell_damage
1980	+43 frost_spell_damage
1981	+44 frost_spell_damage
1982	+46 frost_spell_damage
1983	+47 frost_spell_damage
1984	+49 frost_spell_damage
1985	+50 frost_spell_damage
1986	+51 frost_spell_damage
1987	+53 frost_spell_damage
1988	+54 frost_spell_damage';
$itemlist[25] = '1913	+1 holy_spell_damage
1914	+3 holy_spell_damage
1915	+4 holy_spell_damage
1916	+6 holy_spell_damage
1917	+7 holy_spell_damage
1918	+9 holy_spell_damage
1919	+10 holy_spell_damage
1920	+11 holy_spell_damage
1921	+13 holy_spell_damage
1922	+14 holy_spell_damage
1923	+16 holy_spell_damage
1924	+17 holy_spell_damage
1925	+19 holy_spell_damage
1926	+20 holy_spell_damage
1927	+21 holy_spell_damage
1928	+23 holy_spell_damage
1929	+24 holy_spell_damage
1930	+26 holy_spell_damage
1931	+27 holy_spell_damage
1932	+29 holy_spell_damage
1933	+30 holy_spell_damage
1934	+31 holy_spell_damage
1935	+33 holy_spell_damage
1936	+34 holy_spell_damage
1937	+36 holy_spell_damage
1938	+37 holy_spell_damage
1939	+39 holy_spell_damage
1940	+40 holy_spell_damage
1941	+41 holy_spell_damage
1942	+43 holy_spell_damage
1943	+44 holy_spell_damage
1944	+46 holy_spell_damage
1945	+47 holy_spell_damage
1946	+49 holy_spell_damage
1947	+50 holy_spell_damage
1948	+51 holy_spell_damage
1949	+53 holy_spell_damage
1950	+54 holy_spell_damage';
$itemlist[26] = '1989	+1 nature_spell_damage
1990	+3 nature_spell_damage
1991	+4 nature_spell_damage
1992	+6 nature_spell_damage
1993	+7 nature_spell_damage
1994	+9 nature_spell_damage
1995	+10 nature_spell_damage
1996	+11 nature_spell_damage
1997	+13 nature_spell_damage
1998	+14 nature_spell_damage
1999	+16 nature_spell_damage
2000	+17 nature_spell_damage
2001	+19 nature_spell_damage
2002	+20 nature_spell_damage
2003	+21 nature_spell_damage
2004	+23 nature_spell_damage
2005	+24 nature_spell_damage
2006	+26 nature_spell_damage
2007	+27 nature_spell_damage
2008	+29 nature_spell_damage
2009	+30 nature_spell_damage
2010	+31 nature_spell_damage
2011	+33 nature_spell_damage
2012	+34 nature_spell_damage
2013	+36 nature_spell_damage
2014	+37 nature_spell_damage
2015	+39 nature_spell_damage
2016	+40 nature_spell_damage
2017	+41 nature_spell_damage
2018	+43 nature_spell_damage
2019	+44 nature_spell_damage
2020	+46 nature_spell_damage
2021	+47 nature_spell_damage
2022	+49 nature_spell_damage
2023	+50 nature_spell_damage
2024	+51 nature_spell_damage
2025	+53 nature_spell_damage
2026	+54 nature_spell_damage';
$itemlist[27] = '1837	+1 shadow_spell_damage
1838	+3 shadow_spell_damage
1839	+4 shadow_spell_damage
1840	+6 shadow_spell_damage
1841	+7 shadow_spell_damage
1842	+9 shadow_spell_damage
1843	+10 shadow_spell_damage
1844	+11 shadow_spell_damage
1845	+13 shadow_spell_damage
1846	+14 shadow_spell_damage
1847	+16 shadow_spell_damage
1848	+17 shadow_spell_damage
1849	+19 shadow_spell_damage
1850	+20 shadow_spell_damage
1851	+21 shadow_spell_damage
1852	+23 shadow_spell_damage
1853	+24 shadow_spell_damage
1854	+26 shadow_spell_damage
1855	+27 shadow_spell_damage
1856	+29 shadow_spell_damage
1857	+30 shadow_spell_damage
1858	+31 shadow_spell_damage
1859	+33 shadow_spell_damage
1860	+34 shadow_spell_damage
1861	+36 shadow_spell_damage
1862	+37 shadow_spell_damage
1863	+39 shadow_spell_damage
1864	+40 shadow_spell_damage
1865	+41 shadow_spell_damage
1866	+43 shadow_spell_damage
1867	+44 shadow_spell_damage
1868	+46 shadow_spell_damage
1869	+47 shadow_spell_damage
1870	+49 shadow_spell_damage
1871	+50 shadow_spell_damage
1872	+51 shadow_spell_damage
1873	+53 shadow_spell_damage
1874	+54 shadow_spell_damage';
$itemlist[28] = '1647	+1 Block
1648	+1 Block +1 Strength
1649	+1 Block +1 Strength
1650	+1 Block +2 Strength
1651	+1 Block +2 Strength
1652	+1 Block +3 Strength
1653	+1 Block +3 Strength
1654	+1 Block +4 Strength
1655	+1 Block +4 Strength
1656	+1 Block +5 Strength
1657	+2 Block +5 Strength
1658	+2 Block +6 Strength
1659	+2 Block +6 Strength
1660	+2 Block +7 Strength
1661	+2 Block +7 Strength
1662	+2 Block +8 Strength
1663	+2 Block +8 Strength
1664	+2 Block +9 Strength
1665	+2 Block +9 Strength
1666	+2 Block +9 Strength
1667	+3 Block +9 Strength
1668	+3 Block +10 Strength
1669	+3 Block +10 Strength
1670	+3 Block +10 Strength
1671	+3 Block +10 Strength
1672	+3 Block +11 Strength
1673	+3 Block +11 Strength
1674	+3 Block +12 Strength
1675	+3 Block +12 Strength
1676	+3 Block +12 Strength
1677	+4 Block +12 Strength
1678	+4 Block +12 Strength
1679	+4 Block +12 Strength
1680	+4 Block +12 Strength
1681	+4 Block +12 Strength
1682	+4 Block +13 Strength
1683	+4 Block +13 Strength
1684	+4 Block +14 Strength
1685	+4 Block +14 Strength
1686	+4 Block +14 Strength
1687	+4 Block +14 Strength
1688	+4 Block +15 Strength
1689	+4 Block +15 Strength
1690	+4 Block +16 Strength
1691	+4 Block +16 Strength
1692	+4 Block +16 Strength
1693	+4 Block +16 Strength
1694	+4 Block +17 Strength
1695	+4 Block +17 Strength
1696	+4 Block +18 Strength
1697	+4 Block +18 Strength
1698	+4 Block +18 Strength
1699	+4 Block +18 Strength
1700	+4 Block +19 Strength
1701	+4 Block +19 Strength
1702	+4 Block +20 Strength
1703	+4 Block +20 Strength';
$itemlist[29] = '49	+2 Beast_Slaying
64	+4 Beast_Slaying
76	+6 Beast_Slaying
91	+8 Beast_Slaying
110	+10 Beast_Slaying
130	+12 Beast_Slaying
149	+14 Beast_Slaying';
$itemlist[30] = '2067	+1 mana_every_5
2068	+1 mana_every_5
2069	+1 mana_every_5
2070	+2 mana_every_5
2071	+2 mana_every_5
2072	+2 mana_every_5
2073	+3 mana_every_5
2074	+3 mana_every_5
2075	+4 mana_every_5
2076	+4 mana_every_5
2077	+4 mana_every_5
2078	+5 mana_every_5
2079	+5 mana_every_5
2080	+6 mana_every_5
2081	+6 mana_every_5
2082	+6 mana_every_5
2083	+7 mana_every_5
2084	+7 mana_every_5
2085	+8 mana_every_5
2086	+8 mana_every_5
2087	+8 mana_every_5
2088	+9 mana_every_5
2089	+9 mana_every_5
2090	+10 mana_every_5
2091	+10 mana_every_5
2092	+10 mana_every_5
2093	+11 mana_every_5
2094	+11 mana_every_5
2095	+12 mana_every_5
2096	+12 mana_every_5
2097	+12 mana_every_5
2098	+13 mana_every_5
2099	+13 mana_every_5
2100	+14 mana_every_5
2101	+14 mana_every_5
2102	+14 mana_every_5
2103	+15 mana_every_5
2104	+15 mana_every_5';
$itemlist[31] = '1742	+1 Dodge
1743	+1 Dodge
1744	+1 Dodge
1745	+1 Dodge
1746	+1 Dodge
1747	+1 Dodge
1748	+1 Dodge +1 Agility
1749	+1 Dodge +1 Agility
1750	+1 Dodge +1 Agility
1751	+1 Dodge +2 Agility
1752	+1 Dodge +2 Agility
1753	+1 Dodge +2 Agility
1754	+1 Dodge +3 Agility
1755	+1 Dodge +3 Agility
1756	+1 Dodge +3 Agility
1757	+1 Dodge +4 Agility
1758	+1 Dodge +4 Agility
1759	+1 Dodge +4 Agility
1760	+1 Dodge +5 Agility
1761	+1 Dodge +5 Agility
1762	+1 Dodge +5 Agility
1763	+1 Dodge +6 Agility
1764	+1 Dodge +6 Agility
1765	+1 Dodge +6 Agility
1766	+1 Dodge +7 Agility
1767	+1 Dodge +7 Agility
1768	+1 Dodge +7 Agility
1769	+1 Dodge +8 Agility
1770	+1 Dodge +8 Agility
1771	+1 Dodge +8 Agility
1772	+1 Dodge +9 Agility
1773	+1 Dodge +9 Agility
1774	+1 Dodge +9 Agility
1775	+1 Dodge +9 Agility
1776	+1 Dodge +9 Agility
1777	+1 Dodge +9 Agility
1778	+1 Dodge +9 Agility
1779	+1 Dodge +9 Agility
1780	+1 Dodge +10 Agility
1781	+1 Dodge +10 Agility
1782	+1 Dodge +10 Agility
1783	+1 Dodge +11 Agility
1784	+1 Dodge +11 Agility
1785	+1 Dodge +11 Agility
1786	+1 Dodge +12 Agility
1787	+1 Dodge +12 Agility
1788	+1 Dodge +12 Agility
1789	+1 Dodge +12 Agility
1790	+1 Dodge +13 Agility
1791	+1 Dodge +13 Agility
1792	+1 Dodge +13 Agility
1793	+1 Dodge +14 Agility
1794	+1 Dodge +14 Agility
1795	+1 Dodge +14 Agility
1796	+1 Dodge +14 Agility
1797	+1 Dodge +15 Agility
1798	+1 Dodge +15 Agility';
$itemlist[32] = '2027	+2 Healing_Spells
2028	+4 Healing_Spells
2029	+7 Healing_Spells
2030	+9 Healing_Spells
2031	+11 Healing_Spells
2032	+13 Healing_Spells
2033	+15 Healing_Spells
2034	+18 Healing_Spells
2035	+20 Healing_Spells
2036	+22 Healing_Spells
2037	+24 Healing_Spells
2038	+26 Healing_Spells
2039	+29 Healing_Spells
2040	+31 Healing_Spells
2041	+33 Healing_Spells
2042	+35 Healing_Spells
2043	+37 Healing_Spells
2044	+40 Healing_Spells
2045	+42 Healing_Spells
2046	+44 Healing_Spells
2047	+46 Healing_Spells
2048	+48 Healing_Spells
2049	+51 Healing_Spells
2050	+53 Healing_Spells
2051	+55 Healing_Spells
2052	+57 Healing_Spells
2053	+59 Healing_Spells
2054	+62 Healing_Spells
2055	+64 Healing_Spells
2056	+66 Healing_Spells
2057	+68 Healing_Spells
2058	+70 Healing_Spells
2059	+73 Healing_Spells
2060	+75 Healing_Spells
2061	+77 Healing_Spells
2062	+79 Healing_Spells
2063	+81 Healing_Spells
2064	+84 Healing_Spells';
$itemlist[33] = '1704	+2 ranged_attack_power
1705	+5 ranged_attack_power
1706	+7 ranged_attack_power
1707	+10 ranged_attack_power
1708	+12 ranged_attack_power
1709	+14 ranged_attack_power
1710	+17 ranged_attack_power
1711	+19 ranged_attack_power
1712	+22 ranged_attack_power
1713	+24 ranged_attack_power
1714	+26 ranged_attack_power
1715	+29 ranged_attack_power
1716	+31 ranged_attack_power
1717	+34 ranged_attack_power
1718	+36 ranged_attack_power
1719	+38 ranged_attack_power
1720	+41 ranged_attack_power
1721	+43 ranged_attack_power
1722	+46 ranged_attack_power
1723	+48 ranged_attack_power
1724	+50 ranged_attack_power
1725	+53 ranged_attack_power
1726	+55 ranged_attack_power
1727	+58 ranged_attack_power
1728	+60 ranged_attack_power
1729	+62 ranged_attack_power
1730	+65 ranged_attack_power
1731	+67 ranged_attack_power
1732	+70 ranged_attack_power
1733	+72 ranged_attack_power
1734	+74 ranged_attack_power
1735	+77 ranged_attack_power
1736	+79 ranged_attack_power
1737	+82 ranged_attack_power
1738	+84 ranged_attack_power
1739	+86 ranged_attack_power
1740	+89 ranged_attack_power
1741	+91 ranged_attack_power';
$itemlist[34] = '1547	+2 Attack_Power
1548	+4 Attack_Power
1549	+6 Attack_Power
1550	+8 Attack_Power
1551	+10 Attack_Power
1552	+12 Attack_Power
1553	+14 Attack_Power
1554	+16 Attack_Power
1555	+18 Attack_Power
1556	+20 Attack_Power
1557	+22 Attack_Power
1558	+24 Attack_Power
1559	+26 Attack_Power
1560	+28 Attack_Power
1561	+30 Attack_Power
1562	+32 Attack_Power
1563	+34 Attack_Power
1564	+36 Attack_Power
1565	+38 Attack_Power
1566	+40 Attack_Power
1567	+42 Attack_Power
1568	+44 Attack_Power
1569	+46 Attack_Power
1570	+48 Attack_Power
1571	+50 Attack_Power
1572	+52 Attack_Power
1573	+54 Attack_Power
1574	+56 Attack_Power
1575	+58 Attack_Power
1576	+60 Attack_Power
1577	+62 Attack_Power
1578	+64 Attack_Power
1579	+66 Attack_Power
1580	+68 Attack_Power
1581	+70 Attack_Power
1582	+72 Attack_Power
1583	+74 Attack_Power
1584	+76 Attack_Power
1585	+78 Attack_Power
1586	+80 Attack_Power
1587	+82 Attack_Power
1588	+84 Attack_Power
1589	+86 Attack_Power
1590	+88 Attack_Power
1591	+90 Attack_Power
1592	+92 Attack_Power';
$itemlist[36] = '2105	+1 health_every_5
2106	+1 health_every_5
2107	+1 health_every_5
2108	+1 health_every_5
2109	+1 health_every_5
2110	+2 health_every_5
2111	+2 health_every_5
2112	+2 health_every_5
2113	+2 health_every_5
2114	+3 health_every_5
2115	+3 health_every_5
2116	+3 health_every_5
2117	+3 health_every_5
2118	+4 health_every_5
2119	+4 health_every_5
2120	+4 health_every_5
2121	+4 health_every_5
2122	+5 health_every_5
2123	+5 health_every_5
2124	+5 health_every_5
2125	+5 health_every_5
2126	+6 health_every_5
2127	+6 health_every_5
2128	+6 health_every_5
2129	+6 health_every_5
2130	+7 health_every_5
2131	+7 health_every_5
2132	+7 health_every_5
2133	+7 health_every_5
2134	+8 health_every_5
2135	+8 health_every_5
2136	+8 health_every_5
2137	+8 health_every_5
2138	+9 health_every_5
2139	+9 health_every_5
2140	+9 health_every_5
2141	+9 health_every_5
2142	+10 health_every_5';
$itemlist[37] = '2146	+10 Stamina +22 Healing_Spells +4 mana_every_5
2147	+11 Stamina +22 Healing_Spells +4 mana_every_5
2148	+10 Stamina +24 Healing_Spells +4 mana_every_5
2153	+11 Stamina +24 Healing_Spells +4 mana_every_5
2156	+15 Stamina +33 Healing_Spells +6 mana_every_5
2160	+13 Stamina +29 Healing_Spells +5 mana_every_5
2162	+11 Stamina +26 Healing_Spells +4 mana_every_5';
$itemlist[38] = '2143	+11 Stamina +10 Intellect +12 damage_healing_spells
2144	+11 Stamina +10 Intellect +12 damage_healing_spells
2145	+10 Stamina +10 Intellect +13 damage_healing_spells
2152	+11 Stamina +11 Intellect +13 damage_healing_spells
2155	+15 Stamina +15 Intellect +18 damage_healing_spells
2159	+13 Stamina +13 Intellect +15 damage_healing_spells
2161	+11 Stamina +11 Intellect +14 damage_healing_spells';
$itemlist[39] = '2149	+11 Strength +10 Agility +10 Stamina
2150	+10 Strength +11 Agility +10 Stamina
2151	+10 Strength +10 Agility +11 Stamina
2154	+11 Strength +11 Agility +11 Stamina
2157	+15 Strength +15 Agility +15 Stamina
2158	+13 Strength +13 Agility +13 Stamina
2163	+11 Strength +11 Agility +12 Stamina';
$itemlist[40] = '51	+1 critical_hit
78	+2 critical_hit
116	+3 critical_hit
156	+4 critical_hit';
$itemlist[41] = '32	+1 Damage
33	+2 Damage
34	+3 Damage
80	+4 Damage
99	+5 Damage
119	+6 Damage
138	+7 Damage';
$itemlist[42] = '50	10 on_get_hit_shadow_bolt
65	20 on_get_hit_shadow_bolt
77	30 on_get_hit_shadow_bolt
92	40 on_get_hit_shadow_bolt
131	60 on_get_hit_shadow_bolt
150	70 on_get_hit_shadow_bolt';
$itemlist[43] = '29	+3 Armor
30	+12 Armor
31	+8 Armor
79	+16 Armor
98	+20 Armor
118	+24 Armor
137	+28 Armor
194	+32 Armor
195	+36 Armor
196	+40 Armor
197	+44 Armor
198	+48 Armor
207	+52 Armor
210	+56 Armor';
$itemlist[44] = '117	20 on_get_hit_shadow_bolt +2 Beast_Slaying +1 Defense';*/

$itemlist[35] = '';
insert_stat($itemlist);
?>
