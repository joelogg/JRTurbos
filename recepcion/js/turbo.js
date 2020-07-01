

class Turbo
{
	constructor() 
	{
	    this.destino = "";

	    this.idVeh = -1;
	    this.nomVeh = "";
	    this.idTipVeh = -1;
	    this.nomTipVeh = "";
	    this.idMot = -1;
	    this.nomMot = "";

	    this.idMar = -1;
	    this.nomMar = "";
	    this.idMod = -1;
	    this.nomMod = "";
	    this.idCodTur = -1;
	    this.codTur = "";

	    this.servicioId = -1;
	    this.servicioNom = "";
	    this.servicioTrabajos = "";

	    this.idsPie = [];
	    this.nomsPie = [];
	    this.trasPie = [];
	    this.tipsPie = [];

	    this.precioSer = 0;
	    this.presPie = [];
	    this.precioTotal = 0;
	    this.aCuenta = 0;
	    
	    this.IGV = false;
	    this.idsAcc = [];
	    this.nomsAcc = [];

	    this.fechaEntrega = "";
	    this.horaEntrega = "";

	    this.saldo = 0;
	    this.cantPiesas = 0;
/*
	    this.idVeh = 1;
	    this.nomVeh = "n1";
	    this.idTipVeh = 1;
	    this.nomTipVeh = "n2";
	    this.idMot = 1;
	    this.nomMot = "n3";

	    this.idMar = 1;
	    this.nomMar = "n4";
	    this.idMod = 1;
	    this.nomMod = "m5";
	    this.idCodTur = 1;
	    this.codTur = "n6";

	    this.servicioId = 1;
	    this.servicioNom = "n7";
	    this.servicioTrabajos = "n8";

	    this.idsPie = [1,3];
	    this.nomsPie = ["p1","p3"];
	    this.trasPie = [1,0];
	    this.tipsPie = [0,0];

	    this.precioSer = 0;
	    this.presPie = [0,0];
	    this.precioTotal = 0;
	    this.aCuenta = 0;
		
		this.IGV = false;
	    this.idsAcc = [1, 5];
	    this.nomsAcc = ["Retorno", "Multiple"];

	    this.fechaEntrega = "16-03-2019";
	    this.horaEntrega = "22:55";
	    this.saldo = 0;
	    this.cantPiesas = 2;*/
	    

	}

	limpiar()
	{
	    this.idVeh = -1;
	    this.nomVeh = "";
	    this.idTipVeh = -1;
	    this.nomTipVeh = "";
	    this.idMot = -1;
	    this.nomMot = "";

	    this.idMar = -1;
	    this.nomMar = "";
	    this.idMod = -1;
	    this.nomMod = "";
	    this.idCodTur = -1;
	    this.codTur = "";

	    this.servicioId = -1;
	    this.servicioNom = "";
	    this.servicioTrabajos = "";

	    this.idsPie = [];
	    this.nomsPie = [];
	    this.trasPie = [];
	    this.tipsPie = [];

	    this.precioSer = 0;
	    this.presPie = [];
	    this.precioTotal = 0;
	    this.aCuenta = 0;

	    this.IGV = false;
	    this.idsAcc = [];
	    this.nomsAcc = [];

	    this.fechaEntrega = "";
	    this.horaEntrega = "";

	    this.saldo = 0;
	    this.cantPiesas = 0;
	}

	limpiarResumen()
	{
	    this.precioSer = 0;
	    this.presPie = [];
	    this.precioTotal = 0;
	    this.aCuenta = 0;

	    this.IGV = false;
	    this.idsAcc = [];
	    this.nomsAcc = [];

	    /*this.fechaEntrega = "";
	    this.horaEntrega = "";*/

	    this.saldo = 0;
	}


	ver() 
	{
	    return "-" + this.nomVeh + "2-";
	}


}
